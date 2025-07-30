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
    
    private array $imgExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    private int $excerptLength = 500;

    public function __construct(
        private ConverterInterface $converter,
        string $language = '', 
        string $basePath = '', 
        string $baseUrl = '', 
        string $imgBaseUrl = ''
    ) {
        if ($basePath) {
            $this->basePath = $basePath;
        }
        if ($imgBaseUrl) {
            $this->imgBaseUrl = $baseUrl;
        }
        if ($baseUrl) {
            $this->baseUrl = $baseUrl;
        }
        if ($language) {
            $this->language = $language;
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
    
    public function fromSlug(string $slug): array
    {
        $postDirs = scandir($this->basePath);
        $postDirs = array_diff($postDirs, array('.', '..'));
        foreach ($postDirs as $dir) {            
            if (substr($dir, $slug) !== false) {
                return $this->fromDirectory($dir)->toArray();
            }
        }
        return $this->toArray();
    }

    public function getAll(): array
    {
        $postDirs = scandir($this->basePath);
        $postDirs = array_diff($postDirs, array('.', '..'));
        $postDirs = array_reverse($postDirs);
        $posts = [];
        foreach ($postDirs as $item) {
            $posts[] = $this->fromDirectory($item)->toArray();
        }
        return $posts;
    }

    //----------------------- private-methods -----------------------

    private function toArray(): array
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

    private function fromDirectory(string $directory): self
    {
        $url = $this->getPostUrl($directory);
        $date = $this->getPostDate($directory);
        $content = $this->getPostContent($directory);
        $title = $this->getPostTitle($directory);
        $quote = $this->getPostQuote($content);
        $image = $this->getPostImageUrl($directory);        
        $excerpt = $this->getPostExcerpt($content);
        
        $this->title = $title;
        $this->quote = $quote;
        $this->url = $url;
        $this->excerpt = $excerpt;
        $this->image = $image;
        $this->content = $content;
        $this->date = $date;

        return $this;
    }

    private function getPostUrl(string $directory): string 
    {
        return $this->baseUrl . $directory;
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
            foreach ($content as $key => $line) {
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
        $excerpt = '';
        $excerptText = '';
        $quoteStarted = false;
        $quotePassed = false;
        $textLeft = $this->excerptLength;
        foreach ($lines as $key => $line) {
            if (!$quoteStarted && str_starts_with($line, '>')) {
                $quoteStarted = true;
                continue;
            }
            if ($quoteStarted && !str_starts_with($line, '>')) { 
                $quotePassed = true;
            }
            if ($quotePassed) {
                $textLeft -= strlen($line);
                if ($textLeft <= 0) {
                    break;
                }
                $excerptText .= $line . $this->crlf;
            }
        }
        $excerptText .= mb_substr($line, 0, $this->excerptLength);
        if ($textLeft < 0) {
            $excerptText .= '...';
            $this->shortened = true;
        }
        return $excerpt . $excerptText;
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
}