<?php


namespace App\Services;

use App\DataMapper\ArticleMapper;
use App\Entity\Article;
use App\Model\ArticleModel;
use App\Repository\ArticleRepository;
use App\Services\CMS\CmsService;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService
{
    /**
     * @var ArticleRepository
     */
    private $articleRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var ArticleMapper
     */
    private $mapper;
    /**
     * @var CmsService
     */
    private $cmsService;

    public function __construct(ArticleRepository $articleRepository, EntityManagerInterface $entityManager, ArticleMapper $mapper, CmsService $cmsService)
    {
        $this->articleRepository = $articleRepository;
        $this->entityManager = $entityManager;
        $this->mapper = $mapper;
        $this->cmsService = $cmsService;
    }

    public function all()
    {
        return $this->articleRepository->findAll();
    }

    public function item(string $slug): ?Article
    {
        return $this->articleRepository->findOneBy(['slug' => $slug]);
    }

    public function create(ArticleModel $model): Article
    {
        $article  = $this->mapper->modelToEntity($model, new Article());

        $this->entityManager->persist($article);
        $this->entityManager->flush();

        return $article;
    }

    public function update(ArticleModel $model , Article $article): Article
    {
        $article = $this->mapper->modelToEntity($model, $article);
        $this->entityManager->flush();

        return $article;
    }

    public function delete(Article $article): void
    {
        if ($article) {
            $this->entityManager->remove($article);
            $this->entityManager->flush();
        }
    }

    public function getTemplates(): iterable
    {
        $this->cmsService->getAllTemplates();
    }

    public function getTemplatesOptionForForm(): array
    {
        $options = [];
        $options['templates'] = $this->cmsService->getAllTemplates();

        return $options;
    }


}