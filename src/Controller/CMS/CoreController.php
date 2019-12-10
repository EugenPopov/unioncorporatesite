<?php

namespace App\Controller\CMS;

use App\Entity\Article;
use App\Services\ArticleService;
use App\Services\CMS\CmsReflector;
use App\Services\CMS\CmsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

 class CoreController extends AbstractController
{
    /**
     * @var CmsService
     */
    protected $reflector;
     /**
      * @var ArticleService
      */
     private $articleService;

     public function __construct(CmsReflector $reflector, ArticleService $articleService)
    {
        $this->reflector = $reflector;
        $this->articleService = $articleService;
    }

    public function init(Article $article)
    {
        return $this->reflector->init($article->getTemplate(), $article , $this->container);
    }

     public function default()
     {

         $article = $this->articleService->getDefaultTemplate();
         return $this->reflector->init('main', $article , $this->container);
     }

}
