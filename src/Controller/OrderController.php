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
        $studentId = $request->get('student_id');
        $student = $this->getStudentById($studentId);
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            'student' => $student
        ]);
    }

    public function getStudentById($studentId){
        $student = $this->getDoctrine()
            ->getRepository(Student::class)
            ->findBy(array('id' => $studentId));
        return $student[0];
    }

    public function createOrderView(Request $request)
    {
        $studentId = $request->get('student_id');
        $student = $this->getStudentById($studentId);
        return $this->render('order/create_form.html.twig',
        [
            'student' => $student
        ]);
    }

    public function createOrder(Request $request){
        dd($request);
    }
}
