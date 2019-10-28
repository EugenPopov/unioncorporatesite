<?php

namespace App\Controller\Admin;

use App\Services\CMS\CmsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class HomeController extends AbstractController
{
    public function index()
    {
        return $this->render('admin/home/index.html.twig', [
            'controller_name' => 'CoreController',
        ]);
    }

    /**
     * @Route("/admin/test", name="cms_test")
     * @param CmsService $cmsService
     */
    public function test(CmsService $cmsService)
    {
        $res =  $cmsService->getTemplateDescription('laws');
        dd(gettype($res));
    }
}
