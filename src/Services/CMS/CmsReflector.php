<?php


namespace App\Services\CMS;


use App\Collection\ConfigCollection;
use phpDocumentor\Reflection\Types\Object_;
use Symfony\Component\DependencyInjection\Tests\Fixtures\StdClassDecorator;

class CmsReflector
{
    /**
     * @var CmsService
     */
    private $cmsService;

    public function __construct(CmsService $cmsService)
    {
        $this->cmsService = $cmsService;
    }

    public function init(string $template, $node, $container)
    {
        $options = $this->cmsService->getTemplateDescription($template);

        $options    =   explode('::', $options->action);
        $controller =   new $options[0];
        $action     =   $options[1];

        $controller->setContainer($container);

        $controller->init($node);

        return $controller->$action();
    }
}