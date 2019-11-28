<?php


namespace App\Controller;


use App\Entity\Category;
use App\Services\ArticleService;
use App\Services\CategoryService;
use App\Services\CMS\CmsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CategoryController extends AbstractController
{
    /**
     * @var CategoryService
     */
    private $categoryService;
    /**
     * @var ArticleService
     */
    private $articleService;


    /**
     * CategoryController constructor.
     * @param CategoryService $categoryService
     * @param ArticleService $articleService
     */
    public function __construct(CategoryService $categoryService, ArticleService $articleService)
    {
        $this->categoryService = $categoryService;
        $this->articleService = $articleService;
    }

    public function index(Category $category)
    {
        return $this->render($this->categoryService->getTemplate($category->getTemplate()), [
            'category' => $category,
            'articles' => $this->articleService->getArticlesArray($category->getId())
        ]);
    }
}