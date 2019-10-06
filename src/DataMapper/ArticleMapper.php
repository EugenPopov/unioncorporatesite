<?php


namespace App\DataMapper;

use App\Entity\Article;
use App\Model\ArticleModel;


final class ArticleMapper
{
    public  function entityToModel(Article $article): ArticleModel
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

    public function modelToEntity(ArticleModel $model, Article $article): Article
    {
        $article->setTitle($model->getTitle());
        $article->setDescription($model->getDescription());
        $article->setShortDescription($model->getShortDescription());
        $article->setTemplate($model->getTemplate());
        $article->setCategory($model->getCategory());

        return $article;
    }

}