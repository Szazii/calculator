<?php
namespace AppBundle\Controller;

use AppBundle\Controller\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class TaskController extends Controller
{
    /**
     * @Route("/task",name="task")
     */
    public function newAction(Request $request)
    {
        //$task = new Task();
        //$task->setTask('Write a blog post');
        //$task->setDueDate('siema');

        $form = $this->createFormBuilder(/*$task*/)
            ->add('task', TextType::class)
            ->add('dueDate', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            return $this->redirectToRoute('task');
        }

        return $this->render('task.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}