<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Regex;

class calculatorController extends Controller
{
    /**
     * @Route("/calculator",name="calculator")
     */
    public function newAction(Request $request)
    {
        $value = '';

        $form = $this->createFormBuilder()
            ->add('Operation', TextType::class, [
                'label' => false,
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[0-9]+[0-9\/\*\-\+\.\%]+[0-9]+$/',
                        'message' => 'Błąd w składni działania.'
                    ])
                ],
                'attr' => [
                    'class' => 'operation',
                    'id' => 'task-form',
                    'style' => 'width: 500px; height: 100px; font-size:70px; border-style: outset; border-radius: 8px; border-width: 8px; color: black'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => '=',
                'attr' => [
                    'class' => 'btn btn-primary',
                    'id' => 'submitButton',
                    'value' => 'submit',
                    'style' => 'width: 410px; height: 100px'
                ]
            ])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $calculator = new calculator();
            $calculator->operation = $form['Operation']->getData();
            $result = $calculator->GetResult();

                if ($calculator->error == null)
                    $this->addFlash('error',$result);
                else
                    $this->addFlash('error',$calculator->error);

            return $this->render('calculator.html.twig', [
                'form' => $form->createView()
            ]);
        }

        return $this->render('calculator.html.twig', [
            'form' => $form->createView(),
            'myValue' => $value
        ]);
    }
}