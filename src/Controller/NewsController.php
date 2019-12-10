<?php


namespace App\Controller;


use App\Entity\News;
use App\Services\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * NewsController constructor.
     * @param NewsService $newsService
     */
    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function index()
    {
        /** @var News[] $news */
        $news = $this->newsService->findBy([], ['createdAt' => 'DESC']);
        return $this->render('news/news.html.twig', ['news' => $news]);
    }

    public function newsPost(News $news)
    {
        return $this->render('news/single_post.html.twig', ['post' => $news]);
    }
}