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

class calculatorController extends Controller
{
    /**
     * @Route("/calculator",name="calculator")
     */
    public function newAction(Request $request)
    {
        $value = '';

        $form = $this->createFormBuilder()
            ->add('Operation', TextType::class/*, ['constraints' => [
                new Length(['min' => 3]),
            ],]*/)
            ->add('save', SubmitType::class, ['label' => '=', 'attr' => ['class' => 'btn btn-primary']])
            ->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event){
                $data = $event->getData();
                $form = $event->getForm();

                $calculator = new calculator();
                $calculator->operation = $data['Operation'];
                $result = $calculator->GetResult();

                if ($calculator->error == null)
                    $event->setData(['Operation'=>$result]);
                else
                    $this->addFlash('error',$calculator->error);



            })
            ->getForm();

        $form->handleRequest($request);




        /*if ($form->isSubmitted() && $form->isValid()) {


            $this->addFlash('success','udalo sie');
            $value = 'no siema eniu';

            return $this->render('calculator.html.twig', [
                'form' => $form->createView(),
                'myValue' => $value
            ]);

        }*/

        return $this->render('calculator.html.twig', [
            'form' => $form->createView(),
            'myValue' => $value
        ]);
    }
}