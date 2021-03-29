<?php
declare(strict_types=1);

namespace OniBus;

use JsonSerializable;
use OniBus\Utility\Assert;
use OniBus\Utility\KeyValueList;

class Payload implements JsonSerializable
{
    use KeyValueList {
        set as protected;
        delete as protected;
    }

    public function __construct(array $data)
    {
        foreach ($data as $item => $value) {
            $this->set($item, $value);
        }
    }

    protected function assertRequiredParameters(array $required): void
    {
        Assert::requiredParameters($required, $this->toArray(), $this);
    }

    public function __get($name)
    {
        return $this->get($name);
    }

    public function __call($name, $arguments)
    {
        return $this->get($name);
    }

    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
