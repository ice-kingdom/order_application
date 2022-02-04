<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('test/test.html.twig');
    }
}

//  php bin/console make:controller AuthController --> создание контроллера