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
        return $this->render('home/index.html.twig', ['news' => $this->newsService->entitiesToArray($this->newsRepository->findBy(['isActive' => true], ['createdAt' => 'DESC']))]);
    }
}
