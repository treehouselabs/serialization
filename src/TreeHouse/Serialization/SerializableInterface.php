<?php

namespace TreeHouse\Serialization;

interface SerializableInterface
{
    /**
     * @return array
     */
    public function serialize();

    /**
     * @param array $data
     *
     * @return self
     */
    public static function deserialize($data);
}
