<?php

namespace App\Controller\Admin;

use App\DataMapper\CategoryMapper;
use App\Entity\Category;
use App\Form\CategoryType;
use App\Form\SettingsType;
use App\Model\CategoryModel;
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

    /**
     * @var CategoryMapper
     */
    private $mapper;

    public function __construct(CategoryService $categoryService,CategoryMapper $mapper)
    {
        $this->categoryService = $categoryService;
        $this->mapper = $mapper;
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

        $form = $this->createForm(CategoryType::class, $model, $this->categoryService->getTemplatesOptionForForm());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->categoryService->create($data, new Category());

            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/category/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(Category $category, Request $request): Response
    {
        $model = $this->mapper->entityToModel($category);

        $form = $this->createForm(CategoryType::class, $model, $this->categoryService->getTemplatesOptionForForm());
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->categoryService->update($data, $category);

            return $this->redirectToRoute('admin_category_index');
        }

        return $this->render('admin/category/update.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function delete(Category $category)
    {
        $this->categoryService->delete($category);

        return $this->redirectToRoute('admin_category_index');
    }
}
