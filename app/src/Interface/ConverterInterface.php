<?php

namespace App\Interface;

interface ConverterInterface
{
    public function convert(string $text): string;
}
