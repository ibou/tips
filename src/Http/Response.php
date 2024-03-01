<?php

declare(strict_types=1);

namespace App\Http;

class Response
{
    public function __construct(
        private ?string $content,
        private HttpStatusCode $statusCode,
        private array $headers
    ) {
    }

    public function getStatusCodeValue(): int
    {
        return $this->statusCode->getValue();
    }

    public function getMessageValue(): string
    {
        return $this->statusCode->getMessage();
    }
}