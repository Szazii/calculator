<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */

    public function GetActualDate()
    {
        $actualDate = Date("Y.m.d");

        return $this->render('default/index.html.twig',[ 'actualDate' => $actualDate ]);
    }

}
