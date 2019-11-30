<?php


namespace App\Model;


use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

class ArticleModel implements ModelInterface
{
    /**
     * @Assert\NotBlank()
     */
    private $title;
    /**
     * @Assert\NotBlank()
     */
    private $short_description;
    /**
     * @Assert\NotBlank()
     */
    private $description;

    private $category;

    private $files;

    private $image;

    /**
     * ArticleModel constructor.
     * @param $files
     */
    public function __construct($files = null)
    {
        $this->files = $files;
    }


    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     * @return ArticleModel
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return ArticleModel
     */
    public function setTitle($title)
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
     * @return ArticleModel
     */
    public function setShortDescription($short_description)
    {
        $this->short_description = $short_description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return ArticleModel
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return null
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param null $files
     */
    public function setFiles($files): void
    {
        $this->files = $files;
    }

    /**
     * @return mixed
     */
    public function getImage(): ?UploadedFile
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     * @return ArticleModel
     */
    public function setImage(?UploadedFile $image): self
    {
        $this->image = $image;
        return $this;
    }





}