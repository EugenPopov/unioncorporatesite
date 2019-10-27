<?php


namespace App\Model;


class NewsModel implements ModelInterface
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $short_description;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $mainPhoto;

    /**
     * @var bool
     */
    private $isActive;

    public function __construct(bool $isActive = true)
    {
        $this->isActive = $isActive;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): NewsModel
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getShortDescription()
    {
        return $this->short_description;
    }

    /**
     * @param mixed $short_description
     * @return NewsModel
     */
    public function setShortDescription($short_description)
    {
        $this->short_description = $short_description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;

    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): NewsModel
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     */
    public function setIsActive(bool $isActive): NewsModel
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getMainPhoto(): ?string
    {
        return $this->mainPhoto;
    }

    public function setMainPhoto(string $mainPhoto): NewsModel
    {
        $this->mainPhoto = $mainPhoto;
        return $this;
    }
}