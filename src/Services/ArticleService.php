<?php


namespace App\Services;

use App\DataMapper\ArticleMapper;
use App\Entity\Article;
use App\Model\ArticleModel;
use App\Repository\ArticleRepository;
use App\Services\CMS\CmsService;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;

class ArticleService extends CrudManager
{
    /**
     * @var CmsService
     */
    private $cmsService;

    public function __construct(ArticleRepository $repository, EntityManagerInterface $entityManager, ArticleMapper $mapper, CmsService $cmsService)
    {
        parent::__construct($repository ,$entityManager, $mapper);
        $this->cmsService = $cmsService;
    }

    public function getTemplates(): iterable
    {
        $this->cmsService->getAllTemplates();
    }

    public function getTemplatesOptionForForm(): array
    {
        $options = [];
        $options['templates'] = $this->cmsService->getAllTemplates();

        return $options;
    }


}