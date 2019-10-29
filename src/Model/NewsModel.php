<?php


namespace App\Model;


use Symfony\Component\HttpFoundation\File\UploadedFile;

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
     * @var UploadedFile
     */
    private $mainPhoto;

    /**
     * @var bool
     */
    private $isActive;

    private $article_type;

    public function __construct(bool $isActive = true, $article_type = null)
    {
        if(!$article_type)
            $this->article_type = new NewsTypeModel();
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

    public function getMainPhoto(): ?UploadedFile
    {
        return $this->mainPhoto;
    }

    public function setMainPhoto(?UploadedFile $photo): self
    {
        $this->mainPhoto = $photo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getArticleType(): NewsTypeModel
    {
        return $this->article_type;
    }

    /**
     * @param mixed $article_type
     * @return NewsModel
     */
    public function setArticleType(NewsTypeModel $article_type): self
    {
        $this->article_type = $article_type;
        return $this;
    }






}