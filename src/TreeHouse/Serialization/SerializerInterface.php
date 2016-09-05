<?php

namespace TreeHouse\Serialization;

interface SerializerInterface
{
    /**
     * @param SerializableInterface $object
     *
     * @return string
     */
    public function serialize(SerializableInterface $object);

    /**
     * @param string $eventName
     * @param string $payload
     *
     * @return object
     */
    public function deserialize($eventName, $payload);
}
