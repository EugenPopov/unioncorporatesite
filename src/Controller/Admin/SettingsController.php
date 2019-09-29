<?php

namespace App\Controller\Admin;

use App\Form\CategoryType;
use App\Model\CategoryModel;
use App\Services\CategoryService;
use App\Services\SettingsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends AbstractController
{
    /**
     * @var CategoryService
     */
    private $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
    }

    public function index()
    {
        $categories = $this->settingsService->all();

        return $this->render('admin/settings/index.html.twig', [
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

        return $this->render('admin/settings/create.html.twig', [
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
