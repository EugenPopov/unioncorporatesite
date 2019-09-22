<?php

namespace App\Controller\Admin;

use App\Form\CategoryType;
use App\Form\ContentType;
use App\Model\CategoryModel;
use App\Model\ContentModel;
use App\Repository\CategoryRepository;
use App\Service\ContentHandler\ArticleHandler\ArticleHandlerInterface;
use App\Services\CategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends AbstractController
{
    /**
     * @var CategoryService
     */
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->all();

        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    public function create(Request $request): Response
    {
        $model = new CategoryModel();

        $form = $this->createForm(CategoryType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->categoryService->createCategory($data);

            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/category/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update()
    {
        $categories = $this->categoryService->all();

        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    public function delete(string $slug)
    {
        $categories = $this->categoryService->all();

        return $this->render('admin/category/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
