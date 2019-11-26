<?php

namespace App\Controller;

use App\Repository\NewsRepository;
use App\Services\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @var NewsService
     */
    private $newsService;
    /**
     * @var NewsRepository
     */
    private $newsRepository;


    /**
     * HomeController constructor.
     * @param NewsService $newsService
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsService $newsService, NewsRepository $newsRepository)
    {
        $this->newsService = $newsService;
        $this->newsRepository = $newsRepository;
    }

    public function index()
    {
        return $this->render('home/index.html.twig', ['news' => $this->newsService->findByQueryAndToArray(['isActive' => true], ['createdAt' => 'DESC'])]);
    }

    public function lawsPage()
    {
        return $this->render('laws/laws.html.twig');
    }

    public function medicalPage()
    {
        return $this->render('medical/medical.html.twig');
    }

    public function news()
    {
        return $this->render('news/news.html.twig');
    }

    public function singleChillPage()
    {
        return $this->render('chill/single-chill.html.twig');
    }

    public function singlePost()
    {
        return $this->render('news/single_post.html.twig');
    }
}
