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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var CategoryMapper
     */
    private $mapper;

    public function __construct(CategoryRepository $categoryRepository, EntityManagerInterface $entityManager, CategoryMapper $mapper)
    {
        $this->categoryRepository = $categoryRepository;
        $this->entityManager = $entityManager;
        $this->mapper = $mapper;
    }

    public function all()
    {
        return $this->categoryRepository->findAll();
    }

    public function item(string $slug): Category
    {
        return $this->categoryRepository->findOneBy(['slug' => $slug]);
    }

    public function createCategory(CategoryModel $model): Category
    {
        $category = $this->mapper->modelToEntity($model, new Category());

        $this->entityManager->persist($category);
        $this->entityManager->flush();

        return $category;
    }

    public function updateCategory(CategoryModel $model , Category $category): Category
    {
        $category = $this->mapper->modelToEntity($model, $category);
        $this->entityManager->flush();

        return $category;
    }

    public function deleteCategory(Category $category): void
    {
        if ($category) {
            $this->entityManager->remove($category);
            $this->entityManager->flush();
        }
    }

}