<?php

namespace App\Service;

class TranslationService {
    private string $language = 'ru';

    private array $translations = [
        'ru_RU' => [
            'read_more' => 'Читать далее',
        ],
        'en_US' => [   
            'read_more' => 'Read more',    
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