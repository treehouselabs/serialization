<?php

namespace TreeHouse\Serialization\Test;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use TreeHouse\Serialization\SerializableInterface;

/**
 * @codeCoverageIgnore
 */
abstract class SerializationTestCase extends TestCase
{
    /**
     * @var object
     */
    protected $message;

    /**
     * @return string
     */
    abstract protected function getMessageClass();

    /**
     * @return array
     */
    abstract protected function getProperties();

    public function setUp()
    {
        $reflection = new ReflectionClass($this->getMessageClass());
        $this->message = $reflection->newInstanceArgs(
            array_values(
                $this->getProperties()
            )
        );
    }

    /**
     * @test
     */
    public function it_implements_serializable()
    {
        $this->assertInstanceOf(
            SerializableInterface::class,
            $this->message
        );
    }

    /**
     * @test
     */
    public function it_serializes()
    {
        $this->assertEquals(
            $this->getProperties(),
            $this->message->serialize()
        );
    }

    /**
     * @test
     */
    public function it_deserializes()
    {
        $this->assertEquals(
            $this->message,
            $this->message->deserialize(
                $this->getProperties()
            )
        );
    }

    /**
     * @test
     */
    public function it_serializes_and_deserializes()
    {
        $serialized = $this->message->serialize();

        $this->assertEquals(
            $this->message,
            $this->message->deserialize($serialized)
        );
    }
}
