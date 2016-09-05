<?php

namespace TreeHouse\Serialization;

class SerializableArray implements SerializableInterface
{
    protected $array;

    /**
     * SerializableArray constructor.
     *
     * @param $array
     */
    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    /**
     * @return array
     */
    public function serialize()
    {
        return $this->array;
    }

    /**
     * @param array $data
     *
     * @return self
     */
    public static function deserialize($data)
    {
        return new self($data);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->array[$name];
    }
}
