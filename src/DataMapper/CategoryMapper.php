<?php


namespace App\DataMapper;

use App\Entity\Category;
use App\Model\CategoryModel;


final class CategoryMapper
{
    public static function entityToModel(Category $category): CategoryModel
    {
        $model = new CategoryModel();

        $model->setTitle($category->getTitle())
              ->setDescription($category->getDescription())
              ->setIsActive($category->getIsActive())
        ;

        return $model;

    }

    public function modelToEntity(CategoryModel $model , Category $category):Category
    {
        $category->setTitle($model->getTitle());
        $category->setDescription($model->getDescription());
        $category->setIsActive($model->isActive());

        return $category;
    }

}