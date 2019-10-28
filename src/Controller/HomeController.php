<?php

namespace App\Controller;

use App\Controller\CMS\NodeController;


class HomeController extends NodeController
{
    public function index()
    {
        return $this->render('home/index.html.twig',
            [ 'node' => $this->node ]
        );
    }
}
