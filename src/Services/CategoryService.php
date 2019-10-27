<?php


namespace App\Services;


use App\Collection\TemplateCollection;
use App\DataMapper\CategoryMapper;
use App\Entity\Article;
use App\Entity\ArticleTranslation;
use App\Entity\Category;
use App\Model\CategoryModel;
use App\Model\ContentModel;
use App\Repository\CategoryRepository;
use App\Services\CrudManager\CrudManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;

class CategoryService extends CrudManager
{

    public function __construct(CategoryRepository $repository, EntityManagerInterface $entityManager, CategoryMapper $mapper)
    {
        parent::__construct($repository ,$entityManager, $mapper);
    }

}