<?php

namespace TwitchMenorca\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid extends ValueObject
{
    public function __construct(protected string $value)
    {
        $this->ensureIsValidUuid($value);
    }

    public static function random(): self
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    private function ensureIsValidUuid(string $uuidValue): void
    {
        if (!RamseyUuid::isValid($uuidValue)) {
            throw new InvalidArgumentException(sprintf('<%s> does not allow the value <%s>.', static::class, $uuidValue));
        }
    }
}
