<?php

namespace App\Domain;

use App\Interface\PostInterface;
use App\Interface\ConverterInterface;
use App\Trait\CrlfTrait;

class MarkdownPost implements PostInterface
{
    use CrlfTrait;

    private string $title;
    private string $url;
    private string|bool $image;
    private string $excerpt;
    private string $content;
    private string $date;
    private string $quote;
    private bool $shortened = false;

    private string $basePath = '/opt/app/public/posts/';
    private string $imgBaseUrl = '/posts/';
    private string $baseUrl = '/blog/';
    private string $language = 'ru';
    private int $excerptLength = 500;

    private array $imgExtensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];

    public function __construct(
        private ConverterInterface $converter,
        string $language = '', 
        string $basePath = '', 
        string $baseUrl = '', 
        string $imgBaseUrl = '',
        int $excerptLength = 500
    ) {
        if ($basePath) {
            $this->basePath = $basePath;
        }
        if ($baseUrl) {
            $this->baseUrl = $baseUrl;
        }
        if ($imgBaseUrl) {
            $this->imgBaseUrl = $imgBaseUrl;
        }
        if ($language) {
            $this->language = $language;
        }
        if ($excerptLength) {
            $this->excerptLength = $excerptLength;
        }
    }

    public function exists(): bool
    {
        return !empty($this->url);
    }

    public function isShortened(): bool
    {
        return $this->shortened;
    }
    
    public function fromSlug(string $slug): PostInterface
    {
        $postDirs = scandir($this->basePath);
        $postDirs = array_diff($postDirs, array('.', '..'));
        foreach ($postDirs as $dir) {     
            if (str_contains($dir, $slug) !== false) {
                if ($this->isDraft($dir)) {
                    break;
                }
                return $this->fromDirectory($dir);
            }
        }
        return new self($this->converter, $this->language, $this->basePath, $this->baseUrl, $this->imgBaseUrl);
    }

    public function getAll(): array
    {
        $postDirs = scandir($this->basePath);
        $postDirs = array_diff($postDirs, array('.', '..'));
        $postDirs = array_reverse($postDirs);
        $posts = [];
        foreach ($postDirs as $postDir) {
            if ($this->isDraft($postDir)) {
                continue;
            }
            $posts[] = new self(
                $this->converter, 
                $this->language, 
                $this->basePath, 
                $this->baseUrl, 
                $this->imgBaseUrl
            )->fromDirectory($postDir);
        }
        return $posts;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'url' => $this->url,
            'excerpt' => $this->converter->convert($this->excerpt),
            'content' => $this->converter->convert($this->content),
            'date' => $this->date,
            'image' => $this->image,
            'quote' => $this->converter->convert($this->quote),
            'shortened' => $this->shortened,
        ];
    }

    //----------------------- private-methods -----------------------

    private function fromDirectory(string $directory): self
    {
        $content = $this->getPostContent($directory);
        $this->title = $this->getPostTitle($directory);
        $this->url = $this->getPostUrl($directory);
        $this->image = $this->getPostImageUrl($directory); 
        $this->date = $this->getPostDate($directory);
        $this->content = $content;
        $this->quote = $this->getPostQuote($content);
        $this->excerpt = $this->getPostExcerpt($content);
        return $this;
    }

    private function getPostUrl(string $directory): string 
    {
        $chunks = explode('-', $directory);
        if (count($chunks) > 3) {
            unset($chunks[0]);
            unset($chunks[1]);
            unset($chunks[2]);
            return $this->baseUrl . implode('-', $chunks);
        }
        return '';
    }

    private function getPostImageUrl(string $directory): string|bool
    { 
        $imgPath = $this->basePath . $directory . '/';
        $imgUrl = $this->imgBaseUrl . $directory . '/';
        $exists = false;
        foreach ($this->imgExtensions as $extension) {
            $img = 'image.' . $extension;
            if (file_exists($imgPath . $img)) {
                $imgUrl = $imgUrl . $img;
                $exists = true;
                break;
            }
        }
        return $exists ? $imgUrl : false;        
    }
    
    private function getPostDate(string $directory): string 
    { 
        $chunks = explode('-', $directory);
        if (count($chunks) > 3) {
            return implode('-', [$chunks[0], $chunks[1], $chunks[2]]);
        }
        else return '0000-00-00';
    }
    
    private function getPostContent(string $directory): string 
    {
        $file = $this->basePath . $directory . '/' . $this->language . '.md';
        $content = '';
        if (file_exists($file)) {
            $content = file_get_contents($file);
            $lines = explode($this->crlf, $content);
            foreach ($lines as $key => $line) {
                if (str_starts_with($line, '# ')) {
                    unset($lines[$key]);
                    if (isset($lines[$key + 1]) && empty($lines[$key + 1])) {
                        unset($lines[$key + 1]);
                    }
                    break;
                }
            }
            $content = implode($this->crlf, $lines);
        }
        return $content;
    }

    private function getPostTitle(string $directory): string 
    {
        $file = $this->basePath . $directory . '/' . $this->language . '.md';
        $title = '';
        if (file_exists($file)) {
            $content = file($file);
            foreach ($content as $line) {
                if (str_starts_with($line, '# ')) {
                    $title = trim(str_replace('# ', '', $line));
                    break;
                }
            }
        }
        return $title;
    }

    private function getPostExcerpt(string $content): string 
    {
        $lines = explode($this->crlf, $content);
        $excerptUncut = '';
        $excerpt = '';
        $quoteStarted = false;
        $quotePassed = false;
        $textLeft = $this->excerptLength;
        foreach ($lines as $key => $line) {
            if (!$quoteStarted && str_starts_with($line, '>')) {
                $quoteStarted = true;
                continue;
            }
            if ($quoteStarted && !$quotePassed && !str_starts_with($line, '>')) { 
                $quotePassed = true;
                $line = trim($line);
                if ($line === '' || $line === $this->crlf) {
                    continue; // passing by first empty line after quote
                }
            }
            if ($quotePassed) {
                $textLeft -= mb_strlen($line);
                $excerptUncut .= $line . $this->crlf;
                if ($textLeft <= 0) {
                    break;
                }

            }
        }
        $excerpt = mb_substr($excerptUncut, 0, $this->excerptLength);
        if ($textLeft < 0) {
            $excerpt .= '...';
            $this->shortened = true;
        }
        return $excerpt;
    }

    private function getPostQuote(string $content): string 
    {
        $lines = explode($this->crlf, $content);
        $quote = '';
        $quoteStarted = false;
        foreach ($lines as $key => $line) {
            if (str_starts_with($line, '>')) {
                $quoteStarted = true;
                $quote .= $line . $this->crlf;
            }
            else if ($quoteStarted && !str_starts_with($line, '>')) { 
                break;
            }
        }
        return $quote;
    }

    private function isDraft(string $directory): bool
    {
        return str_starts_with($directory, '_');
    }
}