<?php


namespace App\Services\CMS;

class CmsService
{
    private const DEFAULT_CONFIG_DIR = __DIR__.'/../../../config/cms/';
    private const DEFAULT_CONFIG_FILE = 'templates.yaml';
    /**
     * @var YamlConfigLoader
     */
    private $configLoader;
    private $configs;

    public function __construct(YamlConfigLoader $configLoader)
    {
        $this->configLoader = $configLoader;
        $this->setUpConfigs();
    }

    private function setUpConfigs(): void
    {
        $this->configs = $this->configLoader->load(self::DEFAULT_CONFIG_DIR . self::DEFAULT_CONFIG_FILE);
    }

    public function getConfigs(): \stdClass
    {
        return $this->configs;
    }

    public function getAllTemplates(): iterable
    {
        return  array_keys((get_object_vars($this->configs)));
    }

    public function getTemplateDescription(string $value): \stdClass
    {
        return $this->configs->$value;
    }
}