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
use App\Services\FileManager\FileManager;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService extends CrudManager
{
    private const IMG_UPLOAD_DIR = 'articles/';
    /**
     * @var CmsService
     */
    private $cmsService;
    /**
     * @var FileRepository
     */
    private $fileRepository;
    /**
     * @var FileManager
     */
    private $fileManager;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $entityManager, ArticleMapper $mapper, CmsService $cmsService, FileRepository $fileRepository, FileManager $fileManager)
    {
        parent::__construct($repository ,$entityManager, $mapper);
        $this->cmsService = $cmsService;
        $this->fileRepository = $fileRepository;
        $this->fileManager = $fileManager;
    }

    public function create(ModelInterface $model, EntityInterface $entity)
    {
        /** @var Article $article */
        $article = $this->mapper->modelToEntity($model, $entity);

        $uploadedFile = $this->fileManager->uploadFile($model->getImage(), self::IMG_UPLOAD_DIR);
        $entity->setImage(self::IMG_UPLOAD_DIR . $uploadedFile);

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

        if($model->getImage()){
            $uploadedFile = $this->fileManager->uploadFile($model->getImage(), self::IMG_UPLOAD_DIR);
            $entity->setImage(self::IMG_UPLOAD_DIR . $uploadedFile);
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

    public function getArticlesArray(int $id): array
    {
        return $this->mapper->articlesToArray(... $this->repository->getArticlesByCategory($id));
    }
}