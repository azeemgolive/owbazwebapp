<?php

namespace Owbaz\UserBundle\Controller;

use Owbaz\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Owbaz\UserBundle\Form\Type\JobseekerType;

class UserController extends Controller
{
    
    public function indexAction()
    {
        return $this->render('OwbazUserBundle:Default:index.html.twig');
    }
    
    //-------------------------------add new employer Form------------------------------------------------
    public function NewEmployerAction()
    {
       
    }
    //-------------------------------create new employer------------------------------------------------
    public function createNewEmployerAction()
    {
        
    }
    //-------------------------------add new jobseeker Form------------------------------------------------
    public function newJobseekerAction()
    {
        $entity = new User();
        $form = $this->createForm(new JobseekerType(), $entity);
        return $this->render('OwbazUserBundle:Jobseekers:new.html.twig', array(
                    'form' => $form->createView()));
    }
    //-------------------------------create new jobseeker------------------------------------------------
    public function createJobseekerAction(Request $request)
    {
          $entity = new User();
          $form = $this->createForm(new JobseekerType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setCreatedAt(new \DateTime('now'));
            $entity->setUpdatedAt(new \DateTime('now'));
            $em->persist($entity);
            $em->flush();
        }
        return $this->render('OwbazUserBundle:Jobseekers:thanks.html.twig');
    }
    
    //--------------------------------------------------------------------- 

    private function getEditForm($entity) {
        return $this->createForm(new JobseekerType(), $entity);
    }

    
}
