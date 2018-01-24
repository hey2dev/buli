<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as FrameworkController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends FrameworkController
{
    /**
     * 
     * @Route("/", name="index")
     * 
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->render('@App/index/index.html.twig');
    }
}
