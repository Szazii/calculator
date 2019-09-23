<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Tests\Extension\Core\Type\ButtonTypeTest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class calculatorController extends Controller
{
    /**
     * @Route("/calculator",name="calculator")
     */
    public function newAction(Request $request)
    {
        $value = '';

        $form = $this->createFormBuilder()
            ->add('Operation', TextType::class)
            ->add('save', SubmitType::class, ['label' => '='])
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {


            $this->addFlash('success','udalo sie');
            $value = 'no siema eniu';

            /*return $this->render('calculator.html.twig', [
                'form' => $form->createView(),
                'myValue' => $value
            ]);*/

        }

        return $this->render('calculator.html.twig', [
            'form' => $form->createView(),
            'myValue' => $value
        ]);
    }
}