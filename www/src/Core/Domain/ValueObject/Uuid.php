<?php

namespace Core\Domain\ValueObject;

use http\Exception\InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValid($value);
    }

    public static function random(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
    }

    public function __toString(): string
    {
       return $this->value;
    }

    private function ensureIsValid(string $value)
    {
        if(!RamseyUuid::isValid($value)){
            throw new InvalidArgumentException(sprintf("<%s> O valor não é permitido <%s>.",static::class,$value));
        }
    }
}