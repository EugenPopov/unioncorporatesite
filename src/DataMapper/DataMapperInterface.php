<?php


namespace App\DataMapper;

use App\Model\ModelInterface;


interface DataMapperInterface
{
    public function entityToModel($entity);

    public function modelToEntity($model, $entity);

}