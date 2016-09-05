<?php

namespace TreeHouse\Serialization\Tests;

use PHPUnit_Framework_TestCase;
use TreeHouse\Serialization\SerializableArray;

class SerializableArrayTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed()
    {
        $serializableArray = new SerializableArray();

        $this->assertInstanceOf(SerializableArray::class, $serializableArray);
    }

    /**
     * @test
     */
    public function it_serializes()
    {
        $testArray = ['test' => 'array'];

        $this->assertEquals(
            $testArray,
            (new SerializableArray($testArray))->serialize()
        );
    }

    /**
     * @test
     */
    public function it_deserializes()
    {
        $testArray = ['test' => 'array'];

        $serializableArray = new SerializableArray($testArray);

        $this->assertEquals(
            $serializableArray,
            SerializableArray::deserialize($testArray)
        );
    }

    /**
     * @test
     */
    public function it_gets_property_by_name()
    {
        $serializableArray = new SerializableArray(['test' => 'array']);

        $this->assertEquals(
            'array',
            $serializableArray->get('test')
        );
    }
}
