<?php


namespace App\Services;


use App\DataMapper\CategoryMapper;
use App\Repository\CategoryRepository;
use App\Services\CMS\CmsService;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;

class CategoryService extends CrudManager
{


    private $cmsService;
    private $template_folder;

    public function __construct($template_folder, CategoryRepository $repository, EntityManagerInterface $entityManager, CategoryMapper $mapper, CmsService $cmsService)
    {
        parent::__construct($repository ,$entityManager, $mapper);
        $this->cmsService = $cmsService;
        $this->template_folder = $template_folder;
    }

    public function getTemplates(): iterable
    {
        return $this->cmsService->getAllTemplates();
    }

    public function getDefaultTemplate()
    {
        return $this->repository->findOneBy(['template' => 'main']);
    }

    public function getTemplatesOptionForForm(): array
    {
        $options = [];
        $options['templates'] = $this->cmsService->getAllTemplates();

        return $options;
    }

    public function getTemplate(string $template): ?string
    {
        return $this->template_folder.$this->cmsService->getTemplateDescription($template);
    }

}