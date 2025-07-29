<?php

namespace App\Interfaces;

use App\Models\Post;

interface TranslationInterface
{
    /**
     * Перевести текст
     */
    public function translate(string $text): string;

} 