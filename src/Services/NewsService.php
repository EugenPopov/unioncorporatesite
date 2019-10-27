<?php


namespace App\Services;



use App\DataMapper\NewsMapper;

use App\Entity\EntityInterface;
use App\Model\ModelInterface;
use App\Repository\NewsRepository;
use App\Services\CrudManager\CrudManager;
use App\Services\FileManager\FileManager;
use Doctrine\ORM\EntityManagerInterface;

class NewsService extends CrudManager
{
    private const IMG_UPLOAD_DIR = 'news/';
    /**
     * @var FileManager
     */
    private $fileManager;

    public function __construct(NewsRepository $repository, EntityManagerInterface $entityManager, NewsMapper $mapper, FileManager $fileManager)
    {
        parent::__construct($repository ,$entityManager, $mapper);

        $this->fileManager = $fileManager;
    }

    public function create(ModelInterface $model, EntityInterface $entity)
    {
        $entity  = $this->mapper->modelToEntity($model,  $entity);

        $uploadedFile = $this->fileManager->uploadFile($model->getMainPhoto(), self::IMG_UPLOAD_DIR);
        $entity->setMainPhoto(self::IMG_UPLOAD_DIR . $uploadedFile);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function update(ModelInterface $model, EntityInterface $entity)
    {
        $entity  = $this->mapper->modelToEntity($model,  $entity);

        if($model->getMainPhoto()) {
            $uploadedFile = $this->fileManager->uploadFile($model->getMainPhoto(), self::IMG_UPLOAD_DIR);
            $entity->setMainPhoto($uploadedFile);

        }


        $this->entityManager->flush();

        return $entity;
    }


}