<?php


namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;


class CategoryModel implements ModelInterface
{
    /**
     * @var string
     */
    private $title;
//    /**
//     * @var string
//     */
//    private $description;
    /**
     * @var bool
     */
    private $isActive;
    /**
     * @var bool
     */
    private $isOnFooter;
    /**
     * @Assert\NotBlank()
     */
    private $template;



    public function __construct(bool $isActive = true, bool $isOnFooter = true)
    {
        $this->isActive = $isActive;
        $this->isOnFooter = $isOnFooter;
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
    public function setTitle(string $title): CategoryModel
    {
        $this->title = $title;

        return $this;
    }

//    /**
//     * @return string
//     */
//    public function getDescription(): ?string
//    {
//        return $this->description;
//
//    }
//
//    /**
//     * @param string $description
//     */
//    public function setDescription(string $description): CategoryModel
//    {
//        $this->description = $description;
//
//        return $this;
//    }

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
    public function setIsActive(bool $isActive): CategoryModel
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOnFooter(): bool
    {
        return $this->isOnFooter;
    }

    /**
     * @param bool $isOnFooter
     */
    public function setIsOnFooter(bool $isOnFooter): void
    {
        $this->isOnFooter = $isOnFooter;
    }

    /**
     * @return string
     */
    public function getTemplate(): ?string
    {
        return $this->template;
    }

    /**
     * @param string $template
     */
    public function setTemplate(string $template): self
    {
        $this->template = $template;
        return $this;
    }

}