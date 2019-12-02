<?php

namespace App\Controller\Admin;

use App\DataMapper\ArticleMapper;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Model\ArticleModel;
use App\Model\SettingsModel;
use App\Services\ArticleService;
use App\Services\FileService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @var ArticleService
     */
    private $articleService;
    /**
     * @var ArticleMapper
     */
    private $mapper;
    /**
     * @var FileService
     */
    private $fileService;

    public function __construct(ArticleService $articleService, ArticleMapper $mapper, FileService $fileService)
    {
        $this->articleService = $articleService;
        $this->mapper = $mapper;
        $this->fileService = $fileService;
    }

    public function index()
    {
        $articles = $this->articleService->findBy([], ['createdAt' => 'DESC']);

        return $this->render('admin/article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    public function create(Request $request): Response
    {
        $model = new ArticleModel($this->fileService->getFilesInJson());

        $form = $this->createForm(ArticleType::class, $model);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->articleService->create($data, new Article());

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->render('admin/article/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(Article $article, Request $request): Response
    {
        $model = $this->mapper->entityToModel($article);

        $form = $this->createForm(ArticleType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->articleService->update($data, $article);

            return $this->redirectToRoute('admin_article_index');
        }

        return $this->render('admin/article/update.html.twig', [
            'form' => $form->createView(),
            'files' => $this->fileService->getFilesInJson()
        ]);
    }

    public function delete(Article $article)
    {
        $this->articleService->delete($article);

        return $this->redirectToRoute('admin_article_index');
    }
}
