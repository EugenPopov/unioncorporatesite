<?php


namespace App\DataMapper;

use App\Model\CategoryModel;
use App\Entity\EntityInterface;
use App\Model\ModelInterface;


final class CategoryMapper implements DataMapperInterface
{
    public  function entityToModel(EntityInterface $category): CategoryModel
    {
        $model = new CategoryModel();

        $model->setTitle($category->getTitle())
              ->setDescription($category->getDescription())
              ->setIsActive($category->getIsActive())
        ;

        return $model;

    }

    public function modelToEntity(ModelInterface $model, EntityInterface $category): EntityInterface
    {
        $category->setTitle($model->getTitle());
        $category->setDescription($model->getDescription());
        $category->setIsActive($model->isActive());

        return $category;
    }

}