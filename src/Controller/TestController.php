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
// php bin/console make:user создание модели
/*
 Создаем модель
php bin/console make:entity

Создаем миграцию
php bin/console make:migration

Применяем миграцию
php bin/console doctrine:migrations:migrate
 */