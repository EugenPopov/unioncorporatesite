<?php


namespace App\Services;



use App\DataMapper\NewsMapper;
use App\Entity\News;
use App\Model\NewsModel;
use App\Repository\NewsRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Services\CMS\CmsService;

class NewsService
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var NewsMapper
     */
    private $mapper;

    public function __construct(NewsRepository $newsRepository, EntityManagerInterface $entityManager, NewsMapper $mapper)
    {
        $this->newsRepository=$newsRepository;
        $this->entityManager=$entityManager;
        $this->mapper=$mapper;
    }

    public function all()
    {
        return $this->newsRepository->findAll();
    }

    public function item(string $slug): ?News
    {
        return $this->newsRepository->findOneBy(['slug' => $slug]);
    }

    public function create(NewsModel $model): News
    {
        $news = $this->mapper->modelToEntity($model,new News());

        $this->entityManager->persist($news);
        $this->entityManager->flush();

        return $news;
    }

    public function update(NewsModel $model, News $news): News
    {
        $news = $this->mapper->modelToEntity($model, $news);
        $this->entityManager->flush();

        return $news;
    }

    public function delete(News $news)
    {
        if($news) {
            $this->entityManager->remove($news);
            $this->entityManager->flush();
        }
    }


}