<?php declare(strict_types=1);
namespace App\Tests;

use App\Interface\ConverterInterface;
use PHPUnit\Framework\TestCase;
use App\Domain\MarkdownPost;

final class MarkdownPostTest extends TestCase
{
    public function testMarkdownPostTitle(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post'
        );
        $result = $post->fromSlug('2000-01-01-test-slug');

        $this->assertSame('Test post №1', $result['title']);
    }
}