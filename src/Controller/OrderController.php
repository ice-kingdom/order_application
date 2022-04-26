<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\Student;
use Doctrine\Persistence\ManagerRegistry;
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

        $orders = $this->getDoctrine()
            ->getRepository(Order::class)
            ->findBy(array('student_id' => $studentId));
        $url = $request->headers->get('referer');
        $group = $student->getGroupNumberInEnglish($student->getGroupNumber());
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            'student' => $student,
            'orders' => $orders,
            'url' => $url,
            'group' => $group
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
        $url = $request->headers->get('referer');
        return $this->render('order/create_form.html.twig',
        [
            'student' => $student,
            'url' => $url
        ]);
    }

    public function createOrder(Request $request, ManagerRegistry $doctrine){
        $entityManager = $doctrine->getManager();

        $faculty = $request->get('faculty');
        $date = $request->get('date');
        $orderNumber = $request->get('order_number');
        $studyForm = $request->get('study_form');
        $studyType = $request->get('order_type');
        $studentId = intval($request->get('student_id'));
        $order = new Order();
        $order->setOrderNumber($orderNumber);
        $order->setOrderDate($date);
        $order->setOrderWording($studyType);
        $order->setStudentId($studentId);
        $entityManager->persist($order);
        $entityManager->flush();
        $url = $request->headers->get('referer');
        return $this->redirect('/order/' . $studentId);
    }
}
