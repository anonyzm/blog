<?php

namespace App\Interfaces;

interface ConverterInterface
{
    public function convert(string $text): string;
}
