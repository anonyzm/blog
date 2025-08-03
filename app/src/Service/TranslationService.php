<?php

namespace App\Service;

use App\Interface\TranslationInterface;

class TranslationService implements TranslationInterface {
    private string $locale = '';

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

    public function __construct(string $locale = '') 
    {
        if ($locale) {
            $this->locale = $locale;
        }
        else {
            $this->language = $this->getLocale();
        }
    }

    public function translate(string $text): string 
    {
        return $this->translations[$this->locale][$text] ?? $text;
    }

    //----------------------private-methods----------------------

    private function getLocale(): string
    {
        return $GLOBALS['locale'] ?? 'ru_RU';
    }
}