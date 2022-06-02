<?php

namespace Tests\Unit\TwitchMenorca\Shared\Domain\ValueObject;

use InvalidArgumentException;
use Tests\TestCase;
use TwitchMenorca\Shared\Domain\ValueObject\Uuid;

class UuidTest extends TestCase
{
    public function testConstructor()
    {
        $uuid = new Uuid('c9bfb8c7-b8a1-4b7d-8c6b-b7b7c7b7c7b7');
        $this->assertEquals('c9bfb8c7-b8a1-4b7d-8c6b-b7b7c7b7c7b7', $uuid->value());
    }

    public function testToString()
    {
        $uuidValue = 'a0a0a0a0-a0a0-a0a0-a0a0-a0a0a0a0a0a0';
        $uuid = new Uuid($uuidValue);
        $this->assertEquals($uuidValue, (string) $uuid);
    }

    public function testValue()
    {
        $uuidValue = 'a0a0a0a0-a0a0-a0a0-a0a0-a0a0a0a0a0a0';
        $uuid = new Uuid($uuidValue);
        $this->assertEquals($uuidValue, $uuid->value());
    }

    public function testEquals()
    {
        $uuidValue = 'a0a0a0a0-a0a0-a0a0-a0a0-a0a0a0a0a0a0';
        $uuid = new Uuid($uuidValue);
        $this->assertTrue($uuid->equals(new Uuid($uuidValue)));
    }

    public function testNotEquals()
    {
        $uuidValue = 'a0a0a0a0-a0a0-a0a0-a0a0-a0a0a0a0a0a0';
        $uuid = new Uuid($uuidValue);
        $this->assertFalse($uuid->equals(new Uuid('a0a0a0a0-a0a0-a0a0-a0a0-a0a0a0a0a0b0')));
    }

    public function testRandom()
    {
        $uuid = Uuid::random();
        $this->assertTrue($uuid instanceof Uuid);
    }

    public function testInvalidUuid()
    {
        $this->expectException(InvalidArgumentException::class);
        new Uuid('invalid-uuid');
    }


}
