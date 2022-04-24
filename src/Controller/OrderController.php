<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractController
{
    public function index(Request $request): Response
    {
        $student_id = $request->get('student_id');
        $user = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findBy(array('id' => $student_id));
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            'student' => $user[0]
        ]);
    }
}
