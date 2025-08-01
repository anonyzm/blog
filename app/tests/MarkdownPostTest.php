<?php declare(strict_types=1);
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Domain\MarkdownPost;
use App\Tests\Stub\ConverterStub;

final class MarkdownPostTest extends TestCase
{
    public function testMarkdownPostTitle(): void
    {
        $post = new MarkdownPost(
            new ConverterStub(), 
            'ru', 
            __DIR__ . '/Seeds/Post', 
            '/blog/', 
            '/posts/'
        );
        $result = $post->fromSlug('2000-01-01-test-slug');

        $this->assertSame('Test post №1', $result['title']);
    }
}