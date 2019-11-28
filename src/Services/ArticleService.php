<?php


namespace App\Services;

use App\DataMapper\ArticleMapper;
use App\Entity\Article;
use App\Entity\EntityInterface;
use App\Model\ArticleModel;
use App\Model\ModelInterface;
use App\Repository\ArticleRepository;
use App\Repository\FileRepository;
use App\Services\CMS\CmsService;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService extends CrudManager
{
    /**
     * @var CmsService
     */
    private $cmsService;
    /**
     * @var FileRepository
     */
    private $fileRepository;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $entityManager, ArticleMapper $mapper, CmsService $cmsService, FileRepository $fileRepository)
    {
        parent::__construct($repository ,$entityManager, $mapper);
        $this->cmsService = $cmsService;
        $this->fileRepository = $fileRepository;
    }

    public function create(ModelInterface $model, EntityInterface $entity)
    {
        /** @var Article $article */
        $article = $this->mapper->modelToEntity($model, $entity);
        $this->entityManager->persist($article);
        $this->entityManager->flush();

        $files = json_decode($model->getFiles(), true);
        if($files){
            foreach ($files as $file) {
                $file = $this->fileRepository->findOneBy(['id' => $file]);
                if($file)
                    $article->addFile($file);
            }
        }

        $this->entityManager->flush();
    }

    public function update(ModelInterface $model, EntityInterface $entity)
    {
        $article = $this->mapper->modelToEntity($model, $entity);
        $files = json_decode($model->getFiles(), true);

        foreach ($entity->getFiles() as $file) {
            $entity->removeFile($file);
        }

        if($files){
            foreach ($files as $file) {
                $file = $this->fileRepository->findOneBy(['id' => $file]);
                if($file)
                    $article->addFile($file);
            }
        }
        $this->entityManager->flush();
    }
}