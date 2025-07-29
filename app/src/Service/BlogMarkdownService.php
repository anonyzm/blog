<?php

namespace App\Service;

use App\Interfaces\BlogInterface;

class BlogMarkdownService implements BlogInterface
{

    private array $posts = [
        [
            'id' => 1,
            'title' => 'Первый пост блога',
            'slug' => 'pervyj-post-bloga',
            'excerpt' => 'Это краткое описание первого поста блога...',
            'content' => '<p>Это полный текст первого поста блога. Здесь может быть очень много текста с различными HTML тегами.</p><p>Второй параграф с дополнительной информацией.</p>',
            'date' => '2024-01-15',
            'author' => 'Администратор'
        ],
        [
            'id' => 2,
            'title' => 'Второй пост блога',
            'slug' => 'vtoroj-post-bloga',
            'excerpt' => 'Это краткое описание второго поста блога...',
            'content' => '<p>Это полный текст второго поста блога. Здесь также может быть много контента.</p><p>Еще один параграф для демонстрации.</p>',
            'date' => '2024-01-20',
            'author' => 'Администратор'
        ],
        [
            'id' => 3,
            'title' => 'Третий пост блога',
            'slug' => 'tretij-post-bloga',
            'excerpt' => 'Это краткое описание третьего поста блога...',
            'content' => '<p>Это полный текст третьего поста блога. И здесь тоже много интересного контента.</p><p>Последний параграф поста.</p>',
            'date' => '2024-01-25',
            'author' => 'Администратор'
        ]
    ];

    public function getAllPosts(): array
    {
        return $this->posts;
    }

    public function getPostBySlug(string $slug): ?array
    {
        foreach ($this->posts as $post) {
            if ($post['slug'] === $slug) {
                return $post;
            }
        }
        
        return null;
    }
}