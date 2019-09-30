<?php

namespace App\Twig;

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

    public function __construct(SettingsService $service)
    {
        $this->service = $service;
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('settings', [$this, 'getSettingsValue']),
        ];
    }

    public function getSettingsValue(string $slug): string
    {
       $item = $this->service->item(['slug' => $slug]);

       if($item) {
           return $item->getValue();
       }

       return $slug;
    }
}
