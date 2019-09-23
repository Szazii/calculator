<?php


namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class calculator extends Controller
{
    /**
     * @Route("/calculatorr", name="calculatorr")
     */

    public function GetActualDate()
    {
        $actualDate = Date("Y.m.d");
        return $this->render('calculatorr.html.twig',[ 'actualDate' => $actualDate ]);
    }

}