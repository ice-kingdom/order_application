<?php
/*#index:
#    path: /
#    controller: App\Controller\DefaultController::index
#test:
#  path: /test
  # значение контроллера ммеет формат 'controller_class::method_name'
#  controller: App\Controller\TestController::index*/

use App\Controller\MainPageController;
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
};