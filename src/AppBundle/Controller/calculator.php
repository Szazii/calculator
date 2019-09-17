<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class calculator extends Controller
{
    /**
     * @Route("/calculator", name="calculator")
     */

    public function GetActualDate()
    {
        $actualDate = Date("Y.m.d");
        return $this->render('calculator.html.twig',[ 'actualDate' => $actualDate ]);
    }

}