<?php

namespace App\Interface;

interface TranslationInterface
{
    public function translate(string $text): string;
} 