<?php


namespace App\DataMapper;

use App\Entity\News;
use App\Model\NewsModel;

class NewsMapper
{
    public function entityToModel(News $news) :NewsModel
    {
        $model = new NewsModel();
        $model->setTitle($news->getTitle())
              ->setShortDescription($news->getShortDescription())
              ->setDescription($news->getDescription())
              ->setIsActive($news->getIsActive())
              ->setMainPhoto($news->getMainPhoto())
            ;
        return $model;
    }

    public function modelToEntity(NewsModel $model, News $news) :News
    {
        $news->setTitle($model->getTitle())
             ->setShortDescription($model->getShortDescription())
             ->setDescription($model->getDescription())
             ->setIsActive($model->isActive())
             ->setMainPhoto($model->getMainPhoto())
            ;
        return $news;
    }
}