<?php

namespace App\Controller\Admin;

use App\DataMapper\SettingsMapper;
use App\Entity\Category;
use App\Entity\Settings;
use App\Form\SettingsType;
use App\Model\SettingsModel;
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
    /**
     * @var SettingsMapper
     */
    private $mapper;

    public function __construct(SettingsService $settingsService, SettingsMapper $mapper)
    {
        $this->settingsService = $settingsService;
        $this->mapper = $mapper;
    }

    public function index()
    {
        $settings = $this->settingsService->all();

        return $this->render('admin/settings/index.html.twig', [
            'settings' => $settings,
        ]);
    }

    public function create(Request $request): Response
    {
        $model = new SettingsModel();

        $form = $this->createForm(SettingsType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->settingsService->create($data, new Settings());

            return $this->redirectToRoute('admin_settings_index');
        }

        return $this->render('admin/settings/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function update(Settings $settings, Request $request): Response
    {
        $model = $this->mapper->entityToModel($settings);

        $form = $this->createForm(SettingsType::class, $model);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->settingsService->update($data, $settings);

            return $this->redirectToRoute('admin_settings_index');
        }

        return $this->render('admin/settings/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    public function delete(Settings $settings)
    {
        $this->settingsService->delete($settings);

        return $this->redirectToRoute('admin_settings_index');
    }
}
