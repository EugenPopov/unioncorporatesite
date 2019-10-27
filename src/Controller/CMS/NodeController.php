<?php

namespace App\Controller\CMS;

use App\Entity\Article;
use App\Entity\Category;
use App\Services\CMS\CmsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NodeController extends AbstractController
{
    protected $node;

    public function init($node)
    {
        $this->node = $node;
    }



}
