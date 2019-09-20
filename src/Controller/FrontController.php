<?php

namespace App\Controller;

use App\Services\FrontService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * This dev/test controller for seeing pure mark-up
 * Don`t use in production
 *
 */
class FrontController extends AbstractController
{
    /**
     * @var FrontService
     */
    private $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function item(string $template)
    {
        $this->checkProduction();

        $path = $this->frontService->getTemplatePath($template);

        try {
            return $this->render($path);
        } catch (\Exception $exception) {
            throw new NotFoundHttpException();
        }
    }

    public function help()
    {
       $this->checkProduction();

       $templates =  $this->frontService->getTemplates();

       return $this->render('front/default.html.twig', [
            'templates' => $templates,
       ]);
    }

    private function checkProduction()
    {
        if(getenv('APP_ENV') === 'prod') {
            throw new NotFoundHttpException();
        }
    }
}
