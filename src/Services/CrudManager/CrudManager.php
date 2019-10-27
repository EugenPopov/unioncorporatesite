<?php


namespace App\Services\CrudManager;


use App\Entity\Article;
use App\Model\ArticleModel;
use App\Model\ModelInterface;
use App\Repository\SettingsRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

abstract class CrudManager implements CrudManagerInterface
{

    private $repository;
    private $entityManager;
    private $mapper;

    public function __construct(ServiceEntityRepository $repository, EntityManagerInterface $entityManager, $mapper)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
        $this->mapper = $mapper;
    }

    public function all():iterable
    {
        return $this->repository->findAll();
    }

    public function item(string $slug): object
    {
        return $this->repository->findOneBy(['slug' => $slug]);
    }

    public function create(ModelInterface $model, $entity)
    {
        $article  = $this->mapper->modelToEntity($model, $entity);

        $this->entityManager->persist($article);
        $this->entityManager->flush();

        return $article;
    }

    public function update(ModelInterface $model , $entity)
    {
        $article = $this->mapper->modelToEntity($model, $entity);
        $this->entityManager->flush();

        return $article;
    }

    public function delete($entity): bool
    {
        if ($entity) {
            $this->entityManager->remove($entity);
            $this->entityManager->flush();

            return true;
        }

        return false;
    }
}