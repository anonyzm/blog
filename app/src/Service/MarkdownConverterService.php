<?php

namespace App\Service;

use App\Interface\ConverterInterface;
use App\Trait\CrlfTrait;

class MarkdownConverterService implements ConverterInterface
{
    public function __construct(
        private \ParsedownExtra $parsedown,
    ) {}

    public function convert(string $text): string
    {
        return $this->parsedown->text($text);
    }
}