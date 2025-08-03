<?php declare(strict_types=1);
namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Service\TranslationService;

final class TranslationTest extends TestCase
{
    public function testTranslation(): void
    {
        
        $translator = new TranslationService('ru_RU');
        $result = $translator->translate('main');
        $this->assertIsString($result);
        $this->assertSame('Главная', $result);
    }
}
