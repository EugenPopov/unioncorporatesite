<?php


namespace App\Services;


use App\Collection\TemplateCollection;
use App\DataMapper\CategoryMapper;
use App\DataMapper\NewsMapper;
use App\DataMapper\SettingsMapper;
use App\Entity\Article;
use App\Entity\ArticleTranslation;
use App\Entity\Category;
use App\Entity\Settings;
use App\Model\CategoryModel;
use App\Model\ContentModel;
use App\Model\SettingsModel;
use App\Repository\CategoryRepository;
use App\Repository\NewsRepository;
use App\Repository\SettingsRepository;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;

class SettingsService extends CrudManager
{

    public function __construct(SettingsRepository $repository, EntityManagerInterface $entityManager, SettingsMapper $mapper)
    {
        parent::__construct($repository ,$entityManager, $mapper);
    }

}