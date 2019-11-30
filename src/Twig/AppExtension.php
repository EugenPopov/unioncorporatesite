<?php

namespace App\Twig;

use App\Repository\CategoryRepository;
use App\Repository\NewsRepository;
use App\Services\CategoryService;
use App\Services\SettingsService;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var SettingsService
     */
    private $service;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    public function __construct(SettingsService $service, CategoryRepository $categoryRepository, NewsRepository $newsRepository)
    {
        $this->service = $service;
        $this->categoryRepository = $categoryRepository;
        $this->newsRepository = $newsRepository;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('all_categories', [$this, 'getAllCategories']),
            new TwigFunction('settings', [$this, 'getSettingsValue']),
            new TwigFunction('last_news', [$this, 'getLastNews'])
        ];
    }

    public function getSettingsValue(string $slug): string
    {
       $item = $this->service->item($slug);

       if($item) {
           return $item->getValue();
       }

       return $slug;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->findBy(['isActive' => true]);
    }

    public function getLastNews()
    {
        return $this->newsRepository->findBy([], ['createdAt' => 'DESC'], 2);
    }
}
