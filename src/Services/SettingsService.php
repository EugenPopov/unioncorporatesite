<?php


namespace App\Services;


use App\Collection\TemplateCollection;
use App\DataMapper\CategoryMapper;
use App\DataMapper\SettingsMapper;
use App\Entity\Article;
use App\Entity\ArticleTranslation;
use App\Entity\Category;
use App\Entity\Settings;
use App\Model\CategoryModel;
use App\Model\ContentModel;
use App\Model\SettingsModel;
use App\Repository\CategoryRepository;
use App\Repository\SettingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Finder\Finder;

class SettingsService
{

    /**
     * @var SettingsRepository
     */
    private $settingsRepository;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var SettingsMapper
     */
    private $mapper;

    public function __construct(SettingsRepository $settingsRepository, EntityManagerInterface $entityManager, SettingsMapper $mapper)
    {
        $this->settingsRepository = $settingsRepository;
        $this->entityManager = $entityManager;
        $this->mapper = $mapper;
    }

    public function all()
    {
        return $this->settingsRepository->findAll();
    }

    public function item(array $params): ?Settings
    {
        return $this->settingsRepository->findOneBy($params);
    }

    public function create(SettingsModel $model): Settings
    {
        $settings = $this->mapper->modelToEntity($model, new Settings());

        $this->entityManager->persist($settings);
        $this->entityManager->flush();

        return $settings;
    }

    public function update(SettingsModel $model, Settings $settings): Settings
    {
        $settings = $this->mapper->modelToEntity($model, $settings);
        $this->entityManager->flush();

        return $settings;
    }

    public function delete(Settings $settings): void
    {
        if ($settings) {
            $this->entityManager->remove($settings);
            $this->entityManager->flush();
        }
    }

}