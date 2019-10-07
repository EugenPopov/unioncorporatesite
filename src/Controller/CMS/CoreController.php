<?php

namespace App\Controller\CMS;

use App\Entity\Article;
use App\Services\CMS\CmsReflector;
use App\Services\CMS\CmsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

 class CoreController extends AbstractController
{
    /**
     * @var CmsService
     */
    protected $reflector;

    public function __construct(CmsReflector $reflector)
    {
        $this->reflector = $reflector;
    }

    public function init(Article $article)
    {
        return $this->reflector->init($article->getTemplate(), $article);
    }

}
