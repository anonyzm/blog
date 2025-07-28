<?php

namespace App\Interfaces;

interface BlogInterface
{
    /**
     * Получить список всех постов
     */
    public function getAllPosts(): array;
    
    /**
     * Получить пост по slug
     */
    public function getPostBySlug(string $slug): ?array;
} 