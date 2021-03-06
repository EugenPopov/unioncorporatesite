<?php


namespace App\DataMapper;

use App\Entity\EntityInterface;
use App\Entity\News;
use App\Model\ModelInterface;
use App\Model\NewsModel;
use App\Model\NewsTypeModel;


class NewsMapper implements DataMapperInterface
{
    public function entityToModel(EntityInterface $news) :NewsModel
    {
        $model = new NewsModel();
        $model->setTitle($news->getTitle())
              ->setShortDescription($news->getShortDescription())
              ->setDescription($news->getDescription())
              ->setIsActive($news->getIsActive())
              ->setArticleType(new NewsTypeModel($news->getType()))
            ;
        return $model;
    }

    public function modelToEntity(ModelInterface $model, EntityInterface $news) :News
    {
        $news->setTitle($model->getTitle())
             ->setShortDescription($model->getShortDescription())
             ->setDescription($model->getDescription())
             ->setIsActive($model->isActive())
             ->setType($model->getArticleType()->getName())
            ;
        if($model->getMainPhoto())
            $news->setMainPhoto($model->getMainPhoto());

        return $news;
    }
}