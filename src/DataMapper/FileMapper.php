<?php


namespace App\DataMapper;


use App\Entity\Article;
use App\Entity\EntityInterface;
use App\Entity\File;
use App\Model\FileModel;
use App\Model\ModelInterface;

class FileMapper implements DataMapperInterface
{

    public function entityToModel(EntityInterface $entity): FileModel
    {
        $model = new FileModel();
        $model->setName($entity->getName());
        return $model;
    }

    public function modelToEntity(ModelInterface $model, EntityInterface $entity): File
    {
        $entity->setName($model->getName());
        if($model->getPath())
            $entity->setPath($model->getPath());

        return $entity;
    }

    public function entitiesToArray(File ...$files): array
    {
        $array = [];
        foreach ($files as $file) {
            $array[] = $this->entityToArray($file);
        };

        return $array;
    }

    public function entityToArray(File $file): array
    {
        return [
            'id' => $file->getId(),
            'name' => $file->getName(),
        ];
    }
}