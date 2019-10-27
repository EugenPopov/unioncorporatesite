<?php


namespace App\Model;


use Doctrine\ORM\Mapping as ORM;
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
    /**
     * @Assert\NotBlank()
     */
    private $template;

    private $category;

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
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return ArticleModel
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }



}