<?php

namespace TwitchMenorca\Shared\Domain\ValueObject;

abstract class ValueObject
{
    public function __toString() {
        return (string) $this->value;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(ValueObject $other) {
        return $this->value === $other->value;
    }
}
