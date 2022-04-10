<?php
/*#index:
#    path: /
#    controller: App\Controller\DefaultController::index
#test:
#  path: /test
  # значение контроллера ммеет формат 'controller_class::method_name'
#  controller: App\Controller\TestController::index*/

use App\Controller\LoginController;
use App\Controller\MainPageController;
use App\Controller\RegistrationController;
use App\Controller\TestController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use \App\Controller\AuthController;

return function (RoutingConfigurator $routes) {
    $routes->add('test', '/test')
        // значение контроллера ммеет формат [controller_class, method_name]
        ->controller([TestController::class, 'index'])->methods(['GET']);
    $routes->add('auth', '/auth')
        ->controller([AuthController::class, 'index'])->methods(['GET']);
    $routes->add('home', '/')
        ->controller([MainPageController::class, 'index'])->methods(['GET']);
    $routes->add('logout', '/logout')
        ->controller([LoginController::class, 'logout'])->methods(['POST']);
    $routes->add('students', '/students/{group_name}')
        ->controller([MainPageController::class, 'students'])->methods(['GET']);
    $routes->add('login', '/login')
        ->controller([LoginController::class, 'index'])->methods(['GET']);
    $routes->add('app_register', '/register')
        ->controller([RegistrationController::class, 'register'])->methods(['GET']);
    $routes->add('fu', '/fake')
        ->controller([MainPageController::class, 'fakeUsers'])->methods(['GET']);
};