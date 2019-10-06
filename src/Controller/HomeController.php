<?php

namespace App\Controller;

use App\Controller\CMS\NodeController;


class HomeController extends NodeController
{
    public function index()
    {
        dd($this->node);


        return $this->render('admin/home/index.html.twig', [
            'controller_name' => 'CoreController',
        ]);
    }

    public function test()
    {
        dd($this->node);
        dd('test');

        return $this->render('admin/home/index.html.twig', [
            'controller_name' => 'CoreController',
        ]);

    }

}
