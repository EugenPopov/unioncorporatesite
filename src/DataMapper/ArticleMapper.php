<?php


namespace App\DataMapper;

use App\Entity\Article;
use App\Entity\EntityInterface;
use App\Model\ArticleModel;
use App\Model\ModelInterface;


final class ArticleMapper implements DataMapperInterface
{
    public  function entityToModel(EntityInterface $article): ArticleModel
    {
        $model = new ArticleModel();

        $model->setTitle($article->getTitle())
              ->setDescription($article->getDescription())
              ->setShortDescription($article->getShortDescription())
              ->setTemplate($article->getTemplate())
              ->setCategory($article->getCategory())
        ;

        return $model;

    }

    public function modelToEntity(ModelInterface $model, EntityInterface $article): Article
    {
        $article->setTitle($model->getTitle());
        $article->setDescription($model->getDescription());
        $article->setShortDescription($model->getShortDescription());
        $article->setTemplate($model->getTemplate());
        $article->setCategory($model->getCategory());

        return $article;
    }

}