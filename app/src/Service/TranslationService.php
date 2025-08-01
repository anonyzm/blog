<?php

namespace App\Service;

use App\Interface\TranslationInterface;

class TranslationService implements TranslationInterface {
    private string $language = 'ru';

    // TODO: implement yaml file for translations
    private array $translations = [
        'ru_RU' => [
            'read_more' => 'Читать далее',
            'main' => 'Главная',
        ],
        'en_US' => [   
            'read_more' => 'Read more',    
            'main' => 'Main',
        ]
    ];

    public function __construct(string $language = '') 
    {
        $this->language = $this->getLocale();
        if ($language) {
            $this->language = $language;
        }
    }

    public function translate(string $text): string 
    {
        return $this->translations[$this->language][$text] ?? $text;
    }

    //----------------------private-methods----------------------

    private function getLocale(): string
    {
        return $GLOBALS['locale'];
    }
}