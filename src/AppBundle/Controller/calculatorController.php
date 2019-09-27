<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\Tests\Extension\Core\Type\ButtonTypeTest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;
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
            ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event){
                $data = $event->getData();
                $form = $event->getForm();

                /*$calculator = new calculator();
                $calculator->operation = $data['Operation'];
                $result = $calculator->GetResult();

                if ($calculator->error == null)
                    $event->setData(['Operation'=>$result]);
                else
                    $this->addFlash('error',$calculator->error);*/

                //if ($form->isValid()){
                    //$this->addFlash('error','dziala');
                    //$event->setData(['Operation'=>'2345']);
                //}



            })
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $calculator = new calculator();
            $calculator->operation = $form['Operation']->getData(); //$form->getData('Operation');
            $result = $calculator->GetResult();

                if ($calculator->error == null)
                    //$form->setData(['Operation'=>$result]);
                    $this->addFlash('error',$result);
                else
                    $this->addFlash('error',$calculator->error);

            //$this->addFlash('success','udalo sie');
            //$value = 'no siema eniu';

            return $this->render('calculator.html.twig', [
                'form' => $form->createView(),
                'myValue' => $value
            ]);

        }

        return $this->render('calculator.html.twig', [
            'form' => $form->createView(),
            'myValue' => $value
        ]);
    }
}