<?php


namespace App\Services;


use App\DataMapper\FileMapper;
use App\Entity\EntityInterface;
use App\Model\ModelInterface;
use App\Repository\FileRepository;
use App\Services\CMS\CmsService;
use App\Services\CrudManager\CrudManager;
use App\Services\FileManager\FileManager;
use Doctrine\ORM\EntityManagerInterface;

class FileService extends CrudManager
{
    private $cmsService;
    private const FILE_UPLOAD_DIR = 'files/';
    /**
     * @var FileManager
     */
    private $fileManager;

    public function __construct(FileRepository $repository, EntityManagerInterface $entityManager, FileMapper $mapper, CmsService $cmsService, FileManager $fileManager)
    {
        parent::__construct($repository ,$entityManager, $mapper);
        $this->cmsService = $cmsService;
        $this->fileManager = $fileManager;
    }

    public function create(ModelInterface $model, EntityInterface $entity)
    {
        $entity  = $this->mapper->modelToEntity($model,  $entity);

        $uploadedFile = $this->fileManager->uploadFile($model->getPath(), self::FILE_UPLOAD_DIR);
        $entity->setPath(self::FILE_UPLOAD_DIR . $uploadedFile);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    public function update(ModelInterface $model, EntityInterface $entity)
    {
        $entity  = $this->mapper->modelToEntity($model,  $entity);

        if($model->getPath()) {
            $uploadedFile = $this->fileManager->uploadFile($model->getPath(), self::FILE_UPLOAD_DIR);
            $entity->setPath(self::FILE_UPLOAD_DIR . $uploadedFile);
        }


        $this->entityManager->flush();

        return $entity;
    }

    public function getFilesArray(): array
    {
        return $this->mapper->entitiesToArray(... $this->all());
    }

    public function getFilesInJson(): string
    {
        return json_encode($this->getFilesArray());
    }
}