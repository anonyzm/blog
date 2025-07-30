<?php

namespace App\Interface;

use App\Models\Post;

interface PostInterface
{
    public function exists(): bool;
    public function isShortened(): bool;
    public function fromSlug(string $slug): array;
    public function getAll(): array;
} 