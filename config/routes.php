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
use \App\Controller\OrderController;

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
    $routes->add('fu', '/fake')
        ->controller([MainPageController::class, 'fakeUsers'])->methods(['GET']);
    $routes->add('order', '/order/{student_id}')
        ->controller([OrderController::class, 'index'])->methods(['GET']);
    $routes->add('createOrder', '/createorder/{student_id}')
        ->controller([OrderController::class, 'createOrderView'])->methods(['GET']);
    $routes->add('put_order_in_db', '/create_an_order')
        ->controller([OrderController::class, 'createOrder'])->methods(['POST']);
    $routes->add('get_order', '/get_order')
        ->controller([OrderController::class, 'getOrder'])->methods(['POST']);
    //$routes->add('print_order', '/print_order')
    //    ->controller([OrderController::class, 'printOrder'])->methods(['POST']);
};