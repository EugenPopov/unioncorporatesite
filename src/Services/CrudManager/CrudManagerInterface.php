<?php


namespace App\Services\CrudManager;


use App\Entity\EntityInterface;
use App\Model\ModelInterface;

interface CrudManagerInterface
{
    public function all(): iterable;

    public function item(string $slug);

    public function create(ModelInterface $model, EntityInterface $entity);

    public function update(ModelInterface $model, EntityInterface $entity);

    public function delete(EntityInterface $entity): bool;

    public function findBy(array $parameters = [], array $order = [], int $limit = null);

}