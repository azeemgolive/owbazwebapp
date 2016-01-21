<?php

namespace Owbaz\EmployerBundle\Controller;

use Owbaz\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Owbaz\UserBundle\Form\Type\EmployerType;


class EmployerController extends Controller
{



    //---------- Edit Profile Page------------------------------------------------------------------------------
    public function editEmployerAction($user_id)
    {
        $entity = $this->getEmployer($user_id);
        $form = $this->createForm(new EmployerType(), $entity);
        return $this->render('OwbazEmployerBundle:Employers:edit_employer.html.twig', array(
            'form' => $form->createView(),
            'user_id'=>$entity->getId()
        ));


    }

    //---------- Edit Employer Profile------------------------------------------------------------------------------
    public function updatedEmployerAction(Request $request,$user_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->getEmployer($user_id);
        $form = $this->createForm(new EmployerType(), $entity);
        $form->bind($request);
        if($form->isValid())
        {
            $entity->setUpdatedAt(new \DateTime('now'));
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('owbaz_employer_dashboard',array(
                'user_id' => $entity->getId()
            )));
        }

    }


    //--------- Get Employer Details---------------------------------------------------------------------
    private function getEmployer($id) {
        return $this->getDoctrine()
            ->getRepository('OwbazUserBundle:User')
            ->find($id);
    }
}
