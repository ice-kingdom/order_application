<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends AbstractController
{
    public function index($error = null): Response
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
            'error' => $error
        ]);
    }

    public function authorization(Request $request){
        $login = $request->get("login");
        $password = $request->get("password");

        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['login' => $login]);

        if($user == null){
            return $this->index('неверный логин');
        }
        if($user->getPassword() != $password){
            return $this->index('неверный пароль');
        }
        dd('пользователь существует, пароль и логин совпадают', $login, $password, $user);

        return $this->redirect('/');
    }
}
