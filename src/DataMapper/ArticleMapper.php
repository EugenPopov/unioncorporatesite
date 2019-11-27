<?php


namespace App\DataMapper;

use App\Entity\Article;
use App\Entity\EntityInterface;
use App\Model\ArticleModel;
use App\Model\ModelInterface;


final class ArticleMapper implements DataMapperInterface
{
    /**
     * @var FileMapper
     */
    private $fileMapper;
    /**
     * ArticleMapper constructor.
     * @param FileMapper $fileMapper
     */
    public function __construct(FileMapper $fileMapper)
    {
        $this->fileMapper = $fileMapper;
    }

    public  function entityToModel(EntityInterface $article): ArticleModel
    {
        $model = new ArticleModel();

        if(sizeof($article->getFiles()))
            $model->setFiles(json_encode($this->fileMapper->entitiesToArray(... $article->getFiles())));
        else
            $model->setFiles(json_encode([]));

        $model->setTitle($article->getTitle())
              ->setDescription($article->getDescription())
              ->setShortDescription($article->getShortDescription())
              ->setCategory($article->getCategory())
        ;

        return $model;

    }

    public function modelToEntity(ModelInterface $model, EntityInterface $article): Article
    {
        $article->setTitle($model->getTitle());
        $article->setDescription($model->getDescription());
        $article->setShortDescription($model->getShortDescription());
        $article->setCategory($model->getCategory());

        return $article;
    }

}