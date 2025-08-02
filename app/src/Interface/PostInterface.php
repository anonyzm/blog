<?php

namespace App\Interface;

use App\Models\Post;

interface PostInterface
{
    /**
     * @return bool
     */
    public function exists(): bool;
    /**
     * @return bool
     */
    public function isShortened(): bool; 
    /**
     * @param string $slug
     * @return PostInterface
     */
    public function fromSlug(string $slug): PostInterface;
    /**
     * @return PostInterface[]
     */
    public function getAll(): array;
    /**
     * @return array<string, mixed>
     */
    public function toArray(): array;
} 