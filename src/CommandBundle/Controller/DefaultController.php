<?php

namespace CommandBundle\Controller;

use CommandBundle\Entity\command;
use CommandBundle\Entity\visitor;
use CommandBundle\Form\commandType;
use CommandBundle\Form\visitorType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FormType;


class DefaultController extends Controller
{
    public function homeAction()
    {
        $command = new command();

        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class, $command);

        $formBuilder
            ->setAction($this->generateUrl('command_visitorform'))
            ->add('dateVisit', DateType::class, array('label' => "Date de votre visite"))
            ->add('numberOfVisitors', ChoiceType::class, array(
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 7,
                    '8' => 8
                )))
            ->add('fullDayTickets', CheckboxType::class)
            ->add('continuer', SubmitType::class);

        $form = $formBuilder->getForm();

        return $this->render('CommandBundle:Default:home.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function visitorsAction()
    {
        return $this->render('CommandBundle:Default:visitorsForm.html.twig');
    }
}
