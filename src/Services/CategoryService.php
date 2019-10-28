<?php


namespace App\Services;


use App\DataMapper\CategoryMapper;
use App\Repository\CategoryRepository;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService extends CrudManager
{

    public function __construct(CategoryRepository $repository, EntityManagerInterface $entityManager, CategoryMapper $mapper)
    {
        parent::__construct($repository ,$entityManager, $mapper);
    }

}