<?php


namespace App\Services\CMS;

use App\Collection\ConfigCollection;
use Symfony\Component\Yaml\Yaml;

class YamlConfigLoader
{
    public function load($resource)
    {
        $configValues = Yaml::parseFile($resource, Yaml::PARSE_OBJECT_FOR_MAP);

        return $configValues;
    }

    public function supports($resource): bool
    {
        return is_string($resource) && 'yaml' === pathinfo(
                $resource,
                PATHINFO_EXTENSION
            );
    }
}
