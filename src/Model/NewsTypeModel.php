<?php


namespace App\Model;


class NewsTypeModel
{
    private $name;

    /**
     * NewsTypeModel constructor.
     * @param $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName(): ?string
    {
        return $this->name;
    }




}