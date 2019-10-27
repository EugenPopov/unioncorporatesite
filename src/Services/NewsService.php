<?php


namespace App\Services;



use App\DataMapper\NewsMapper;

use App\Repository\NewsRepository;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;

class NewsService extends CrudManager
{
    public function __construct(NewsRepository $repository, EntityManagerInterface $entityManager, NewsMapper $mapper)
    {
        parent::__construct($repository ,$entityManager, $mapper);
    }

}