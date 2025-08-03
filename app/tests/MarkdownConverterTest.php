<?php declare(strict_types=1);
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\MarkdownConverterService;
use ParsedownExtra;

final class MarkdownConverterTest extends TestCase
{
    public function testMarkdownH1(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('#Hello, world!');
        $this->assertIsString($result);
        $this->assertSame('<h1>Hello, world!</h1>', $result);
    }

    public function testMarkdownH2(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('##Hello, world!');
        $this->assertIsString($result);
        $this->assertSame('<h2>Hello, world!</h2>', $result);
    }

    public function testMarkdownStriked(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('~~The world is flat.~~');
        $this->assertIsString($result);
        $this->assertSame('<p><del>The world is flat.</del></p>', $result);
    }

    public function testMarkdownItalic(): void 
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('_rendered as italicized text_');
        $this->assertIsString($result);
        $this->assertSame('<p><em>rendered as italicized text</em></p>', $result);
    }

    public function testMarkdownBold(): void 
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('**rendered as bold text**');
        $this->assertIsString($result);
        $this->assertSame('<p><strong>rendered as bold text</strong></p>', $result);
    }

    public function testMarkdownHref(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('http://www.example.com');
        $this->assertIsString($result);
        $this->assertSame('<p><a href="http://www.example.com">http://www.example.com</a></p>', $result);
    }

    public function testMarkdownHtml(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $result = $converter->convert('<div class="notices yellow"><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>');
        $this->assertIsString($result);
        $this->assertSame('<div class="notices yellow"><p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>', $result);
    }

    public function testMarkdownQuote(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $quote = "> I'll be back!" . PHP_EOL .
            ">" . PHP_EOL .
            "> <cite>- Arnold Schwarzenegger</cite>" . PHP_EOL;
        $assertQuote = '<blockquote>' . PHP_EOL .
            '<p>I\'ll be back!</p>' . PHP_EOL .
            '<p><cite>- Arnold Schwarzenegger</cite></p>' . PHP_EOL .
            '</blockquote>';
        $result = $converter->convert($quote);
        $this->assertIsString($result);
        $this->assertSame($assertQuote, $result);
    }

    public function testMarkdownСode(): void
    {
        $converter = new MarkdownConverterService(new ParsedownExtra());
        $code = "```" . PHP_EOL .
            "func (r *ShopRepository) GetByID(id int64) (*Shop, error) {" . PHP_EOL .
            "var shop Shop" . PHP_EOL .
            "err := r.db.Raw(\"SELECT * FROM shops WHERE id=?\", id).Scan(&shop).Error" . PHP_EOL .
            "return &shop, err" . PHP_EOL .
            "```";
        $assertCode = "<pre><code>func (r *ShopRepository) GetByID(id int64) (*Shop, error) {" . PHP_EOL .
            "var shop Shop" . PHP_EOL .
            "err := r.db.Raw(\"SELECT * FROM shops WHERE id=?\", id).Scan(&amp;shop).Error" . PHP_EOL .
            "return &amp;shop, err</code></pre>";
        $result = $converter->convert($code);
        $this->assertIsString($result);
        $this->assertSame($assertCode, $result);
    }
}
