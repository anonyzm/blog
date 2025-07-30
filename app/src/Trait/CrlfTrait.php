<?php

namespace App\Trait;

trait CrlfTrait {
    protected string $crlf = PHP_EOL;

    protected function setCRLF(string $content): void
    {
        if (str_contains($content, "\r\n")) {
            $this->crlf = "\r\n";
        }
        else {
            $this->crlf = PHP_EOL;
        }
    }
}