<?php


namespace App\Controller;


use App\Entity\Category;
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
     * CategoryController constructor.
     * @param CategoryService $categoryService
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(Category $category)
    {
        return $this->render($this->categoryService->getTemplate($category->getTemplate()));
    }
}