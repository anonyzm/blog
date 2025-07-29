<?php

namespace App\Models;

class Post
{
    private string $title;
    private string $slug;
    private string|bool $image;
    private string $excerpt;
    private string $content;
    private string $date;

    private string $basePath = '/opt/app/public/posts/';
    private string $baseUrl = '/posts/';
    private array $imgExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    private string $language = 'ru';

    public function __construct(string $language = '', string $basePath = '', string $baseUrl = '')
    {
        if ($basePath) {
            $this->basePath = $basePath;
        }
        if ($baseUrl) {
            $this->baseUrl = $baseUrl;
        }
        if ($language) {
            $this->language = $language;
        }
    }

    public function fromDirectory(string $directory): self
    {
        $slug = $this->getPostSlug($directory);
        $date = $this->getPostDate($directory);
        $content = $this->getPostContent($directory);

        $title = $this->getPostTitle($content);
        $excerpt = $this->getPostExcerpt($content);
        
        $this->id = $id;
        $this->title = $title;
        $this->slug = $slug;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->date = $date;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'date' => $this->date,
            'author' => $this->author,
        ];
    }

    //----------------------- private-methods -----------------------

    private function getPostSlug(string $directory): string 
    {
        $chunks = explode('-', $directory);
        if (count($chunks) > 3) {
            unset($chunks[0]);
            unset($chunks[1]);
            unset($chunks[2]);
        }
        return implode('-', $chunks);
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
        if (file_exists($file)) {
            return file_get_contents($file);
        }
        else return '';
    }

    private function getPostTitle(string $directory): string 
    {
        $file = $this->basePath . $directory . '/title.txt';
        if (file_exists($file)) {
            return file_get_contents($file);
        }
        else return '';
    }

    private function getPostExcerpt(string $content): string 
    {

    }

}