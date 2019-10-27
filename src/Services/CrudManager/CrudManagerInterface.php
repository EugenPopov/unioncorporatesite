<?php


namespace App\Services\CrudManager;


use App\Model\ModelInterface;

interface CrudManagerInterface
{
    public function all(): iterable;

    public function item(string $slug);

    public function create(ModelInterface $model, $entity);

    public function update(ModelInterface $model, $entity);

    public function delete($entity): bool;

}