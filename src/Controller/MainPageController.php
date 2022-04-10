<?php

namespace App\Controller;

use App\Entity\Student;
use App\Entity\User;
use App\Repository\StudentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainPageController extends AbstractController
{
    public function index(): Response
    {
        $user = $this->getUser();
        if($user == null){
            return $this->redirectToRoute('login');
        }
        return $this->render('main_page/index.html.twig', [
            'controller_name' => 'домашняя страница',
        ]);
    }

    public function students(Request $request)
    {
        $groupName = $request->get('group_name');
        return $this->render('students/index.html.twig',
        ['group' => $groupName]);
    }

    public function fakeUsers(ManagerRegistry $doctrine){
        $entityManager = $doctrine->getManager();

        $student = new Student();
        $student->setFirstName("Oleg");
        $student->setLastName("Pauli");
        $student->setGroupNumber("MT-101");
        $student->setCourse(1);

        // сообщите Doctrine, что вы хотите (в итоге) сохранить Продукт (пока без запросов)
        $entityManager->persist($student);

        // действительно выполните запросы (например, запрос INSERT)
        $entityManager->flush();
        return $this->redirectToRoute('home');
        //return new Response('Saved new product with id '.$student->getId());
    }
}
