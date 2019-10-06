<?php


namespace App\Collection;

class ConfigCollection implements \IteratorAggregate
{

    /**
     * @var array
     */
    private $configs;

    /**
     * PictureCollection constructor.
     * @param array $configs
     */
    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    /**
     * @return iterable
     */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->configs);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->configs;
    }
}