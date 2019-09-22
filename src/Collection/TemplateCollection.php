<?php


namespace App\Collection;

class TemplateCollection implements \IteratorAggregate
{

    /**
     * @var array
     */
    private $templates;

    /**
     * PictureCollection constructor.
     * @param array $templates
     */
    public function __construct(array $templates)
    {
        $this->templates = $templates;
    }

    /**
     * @return iterable
     */
    public function getIterator(): iterable
    {
        return new \ArrayIterator($this->templates);
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->templates;
    }
}