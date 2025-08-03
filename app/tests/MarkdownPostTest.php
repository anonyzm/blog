<?php declare(strict_types=1);

namespace App\Tests;

use App\Interface\ConverterInterface;
use App\Trait\CrlfTrait;
use PHPUnit\Framework\TestCase;
use App\Domain\MarkdownPost;

final class MarkdownPostTest extends TestCase
{
    use CrlfTrait;

    public function testMarkdownPostTitle(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );
        $result1 = $post->fromSlug('test-slug')->toArray();
        $result2 = $post->fromSlug('second-test')->toArray();

        $this->assertSame('Test post №1', $result1['title']);
        $this->assertSame('Test post №2', $result2['title']);
    }

    public function testMarkdownPostUrl(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );
        $result1 = $post->fromSlug('test-slug')->toArray();
        $result2 = $post->fromSlug('second-test')->toArray();
    
        $this->assertSame('/blog/test-slug', $result1['url']);     
        $this->assertSame('/blog/second-test', $result2['url']);     
    }

    public function testMarkdownPostImage(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $imgBaseUrl = '/posts/';
        $basePath = __DIR__ . '/Seeds/Post/';
        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            $basePath,
            '/blog/',
            $imgBaseUrl
        );
        $resultWithImage = $post->fromSlug('test-slug')->toArray();
        $imageRelativePath = str_replace($imgBaseUrl, '', $resultWithImage['image']);
        $resultWithoutImage = $post->fromSlug('second-test')->toArray();
    
        $this->assertSame('/posts/2000-01-01-test-slug/image.png', $resultWithImage['image']);     
        $this->assertFileExists($basePath . $imageRelativePath);
        $this->assertFalse($resultWithoutImage['image']);
    }

    public function testMarkdownPostDate(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );

        $result1 = $post->fromSlug('test-slug')->toArray();
        $result2 = $post->fromSlug('second-test')->toArray();
         
        $this->assertSame('2000-01-01', $result1['date']);     
        $this->assertSame('2001-02-02', $result2['date']);  
    }

    public function testMarkdownPostQuote(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );

        $result1 = $post->fromSlug('test-slug')->toArray();
        $result2 = $post->fromSlug('second-test')->toArray();
        $this->setCRLF($result1['quote']);
        
        $quote1 = "> I'll be back!" . $this->crlf .
            ">" . $this->crlf .
            "> <cite>- Arnold Schwarzenegger</cite>" . $this->crlf;
        $quote2 = "> I'm back!" . $this->crlf .
            ">" . $this->crlf .
            "> <cite>- Arnold the Hogger</cite>" . $this->crlf;

        $this->assertSame($quote1, $result1['quote']);     
        $this->assertSame($quote2, $result2['quote']);  
    }

    public function testMarkdownPostExcerpt(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $excerptLength = 100;
        $imgBaseUrl = '/posts/';
        $basePath = __DIR__ . '/Seeds/Post/';
        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            $basePath,
            '/blog/',
            $imgBaseUrl,
            $excerptLength
        );

        $result1 = $post->fromSlug('test-slug')->toArray();
        $result2 = $post->fromSlug('second-test')->toArray();
        
        $excerpt1 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore ...";
        $excerpt2 = "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classi...";

        $this->assertSame($excerpt1, $result1['excerpt']);     
        $this->assertSame($excerpt2, $result2['excerpt']);  
    }

    public function testMarkdownPostContent(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );

        $result1 = $post->fromSlug('test-slug')->toArray();
        $result2 = $post->fromSlug('second-test')->toArray();
        $this->setCRLF($result1['content']);

        $content1 = $this->crlf . "> I'll be back!" . $this->crlf .
            ">" . $this->crlf .
            "> <cite>- Arnold Schwarzenegger</cite>" . $this->crlf .
            "" . $this->crlf .
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." . $this->crlf;
        $content2 = $this->crlf . "> I'm back!" . $this->crlf .
            ">" . $this->crlf .
            "> <cite>- Arnold the Hogger</cite>" . $this->crlf .
            "" . $this->crlf .
            "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32." . $this->crlf;

        $this->assertSame($content1, $result1['content']);     
        $this->assertSame($content2, $result2['content']);  
    }

    public function testMarkdownPostDraftAndExists(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );
        $resultNormal = $post->fromSlug('test-slug');
        $resultDraft = $post->fromSlug('test-draft');
        $resultWrong = $post->fromSlug('this-slug-does-not-exist');
    
        $this->assertTrue($resultNormal->exists());     
        $this->assertFalse($resultDraft->exists());
        $this->assertFalse($resultWrong->exists());
    }

    public function testMarkdownPostGetAll(): void
    {
        $converterMock = $this->createMock(ConverterInterface::class);
        $converterMock->method('convert')
             ->willReturnArgument(0);

        $post = new MarkdownPost(
            $converterMock, 
            'ru', 
            __DIR__ . '/Seeds/Post/'
        );
        $results = $post->getAll();

        $this->assertCount(2, $results);
        $this->assertTrue($results[0]->exists());
        $this->assertTrue($results[1]->exists());
        $this->assertSame('Test post №2', $results[0]->toArray()['title']);
        $this->assertSame('Test post №1', $results[1]->toArray()['title']);
    }
}