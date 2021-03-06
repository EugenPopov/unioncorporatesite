<?php


namespace App\Controller\Admin;

use App\DataMapper\NewsMapper;
use App\Entity\News;
use App\Form\NewsType;
use App\Model\NewsModel;
use App\Services\NewsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\{Request, Response};


class NewsController extends AbstractController
{
    /**
     * @var NewsService
     */
    private $newsService;

    /**
     * @var NewsMapper
     */
    private $mapper;

    public function __construct(NewsService $newsService, NewsMapper $mapper)
    {
        $this->newsService = $newsService;
        $this->mapper = $mapper;
    }

    public function index()
    {
        $news = $this->newsService->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin/news/index.html.twig', [
            'news' => $news,
        ]);
    }

    public function create(Request $request): Response
    {
        $form = $this->createForm(NewsType::class);
        $form->handleRequest($request);


        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->newsService->create($data, new News());

            return $this->redirectToRoute('admin_news_index');
        }

        return $this->render('admin/news/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(News $news, Request $request): Response
    {
        $model = $this->mapper->entityToModel($news);

        $form = $this->createForm(NewsType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->newsService->update($data, $news);

            return $this->redirectToRoute('admin_news_index');
        }

        return $this->render('admin/news/update.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function delete(News $news)
    {
        $this->newsService->delete($news);

        return $this->redirectToRoute('admin_news_index');
    }
}