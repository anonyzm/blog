<?php declare(strict_types=1);

namespace App\Tests\Stub;

use App\Interface\ConverterInterface;

class ConverterStub implements ConverterInterface
{
    public function convert(string $content): string
    {
        return $content;
    }
}