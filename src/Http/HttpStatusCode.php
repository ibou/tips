<?php

declare(strict_types=1);

namespace App\Http;

enum HttpStatusCode: int
{
    case Ok = 200;
    case Created = 201;
    case BadRequest = 400;
    case Forbidden = 403;
    case LargeHeaders = 431;
    case InternalServerError = 500;

    public function getValue(): int
    {
        return $this->value;
    }

    public function getMessage(): string
    {
        return match ($this) {
            self::Ok => 'OKOK TOP',
            self::Created => 'Created',
            self::BadRequest => 'Bad Request',
            self::Forbidden => 'Forbidden',
            self::LargeHeaders => 'Request Header Fields Too Large',
            self::InternalServerError => 'Internal Server Error',
        };
    }

}
