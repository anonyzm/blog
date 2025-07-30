<?php

namespace App\Domain;

use App\Interface\PostInterface;
use App\Interface\ConverterInterface;

class MarkdownPost implements PostInterface
{
    private string $title;
    private string $url;
    private string|bool $image;
    private string $excerpt;
    private string $content;
    private string $date;

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
        ];
    }

    private function fromDirectory(string $directory): self
    {
        $url = $this->getPostUrl($directory);
        $date = $this->getPostDate($directory);
        $content = $this->getPostContent($directory);
        $title = $this->getPostTitle($directory);
        $image = $this->getPostImageUrl($directory);        
        $excerpt = $this->getPostExcerpt($content);
        
        $this->title = $title;
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
        $imgUrl = $this->baseUrl . $directory . '/';
        $exists = false;
        foreach ($this->imgExtensions as $extension) {
            $img = $imgUrl . 'image.' . $extension;
            if (file_exists($img)) {
                $exists = true;
                break;
            }
        }
        return $exists ? $img : false;
        
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
            $content = file($file);
            foreach ($content as $key => $line) {
                if (str_starts_with($line, '# ')) {
                    unset($content[$key]);
                    if (isset($content[$key + 1]) && empty($content[$key + 1])) {
                        unset($content[$key + 1]);
                    }
                    break;
                }
            }
            $content = implode(PHP_EOL, $content);
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
        $lines = explode(PHP_EOL, $content);
        $excerpt = '';
        $excerptText = '';
        $quoteStarted = false;
        $quotePassed = false;
        $textLeft = $this->excerptLength;
        foreach ($lines as $key => $line) {
            if (!$quoteStarted && str_starts_with($line, '> ')) {
                $quoteStarted = true;
                $excerpt .= $line . PHP_EOL;
                continue;
            }
            if ($quoteStarted && !str_starts_with($line, '> ')) { 
                $quotePassed = true;
            }
            if ($quotePassed) {
                $textLeft -= strlen($line);
                if ($textLeft <= 0) {
                    break;
                }
                $excerptText .= $line . PHP_EOL;
            }
        }
        $excerptText .= mb_substr($line, 0, $this->excerptLength);
        if ($textLeft < 0) {
            $excerptText .= '...';
        }
        return $excerpt . $excerptText;
    }

}