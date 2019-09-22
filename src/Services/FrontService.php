<?php


namespace App\Services;


use App\Collection\TemplateCollection;
use Symfony\Component\Finder\Finder;

class FrontService
{
    private const DEFAULT_FRONT_DIR = 'front';
    private const DEFAULT_TEMPLATE_PATH = '/../../templates/';

    /**
     * @var Finder
     */
    private $finder;

    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
    }

    /**
     * @param string $template
     * @return string
     */
    public function getTemplatePath(string $template): string
    {
        return self::DEFAULT_FRONT_DIR . '/' .$template;
    }

    /**
     * @return TemplateCollection
     */
    public function getTemplates(): TemplateCollection
    {
        $templates = [];

        $this->finder->files()->in(__DIR__ . self::DEFAULT_TEMPLATE_PATH . self::DEFAULT_FRONT_DIR );

        foreach ($this->finder as $file) {
            $templates[] = $file->getFilename();
        }

        return new TemplateCollection($templates);
    }
}