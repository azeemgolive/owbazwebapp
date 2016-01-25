<?php

namespace Owbaz\UserBundle\Controller;

use Owbaz\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Owbaz\UserBundle\Form\Type\JobseekerType;
use Owbaz\UserBundle\Form\Type\EmployerType;

class UserController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('OwbazUserBundle:User')->find($user_id);
        if($entity->getUserType()=="jobseeker"){
            return $this->render('OwbazUserBundle:Jobseekers:dashboard.html.twig',array('jobseeker'=>$entity));
        }else if($entity->getUserType()=="employer")
        {
            return $this->render('OwbazUserBundle:Employers:dashboard.html.twig',array('employer'=>$entity));
        }else
        {
            $request = $this->getRequest();
            $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                    SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
                        'OwbazUserBundle:Security:login.html.twig', array(
                    // last username entered by the user
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
                        )
        );
        }
    }

    //-------------------------------add new employer Form------------------------------------------------
    public function NewEmployerAction()
    {
        $entity = new User();
        $form = $this->createForm(new EmployerType(), $entity);
        return $this->render('OwbazUserBundle:Employers:employer_register.html.twig', array(
            'form' => $form->createView()));

    }
    //-------------------------------create new employer------------------------------------------------
    public function createEmployerAction(Request $request)
    {
        $entity = new User();
        $form = $this->createForm(new EmployerType(), $entity);
        $form->bind($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $entity->setCreatedAt(new \DateTime('now'));
            $entity->setUpdatedAt(new \DateTime('now'));
            $em->persist($entity);
            $em->flush();

            return $this->render('OwbazUserBundle:Employers:thanks.html.twig');
        }else
        {
            $this->addFlash(
                'error',
                'Password Does Not Match'
            );
            return $this->redirect($this->generateUrl('owbaz_new_employer'));
        }

    }
    //-------------------------------add new jobseeker Form------------------------------------------------
    public function newJobseekerAction()
    {
        $entity = new User();
        $form = $this->createForm(new JobseekerType(), $entity);
        return $this->render('OwbazUserBundle:Jobseekers:jobseeker_register.html.twig', array(
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

    public function userLoginAction()
    {
        return $this->render('OwbazUserBundle:User:login.html.twig');
    }

    public function checkUserLoginAction(Request $request)
    {
        $request  = $this->getRequest();
        $email =  $request->get('email');
        $password = $request->get('password');
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OwbazUserBundle:User')->userLogin($email,md5($password));
        //return new Response($em);
        if($entity)
        {
            if($entity->user_type=="jobseeker")
            {
                return $this->redirect($this->generateUrl('owbaz_jobseeker_dashboard',array('user_id' => $entity->getId())));
            }else
            {
                return $this->redirect($this->generateUrl('owbaz_employer_dashboard',array(
                    'user_id' => $entity->getId()
                )));
            }
            return $this->redirect($this->generateUrl('owbaz_users_dashboard')); // redirect change url of the page
           }else
           {
            $this->addFlash(
                'error',
                'Invalid User Name And Password'
            );
            return $this->redirect($this->generateUrl('owbaz_users_login'));
           }
    }

    public function employerDashboardAction()
    {
        return $this->render('OwbazUserBundle:Employers:dashboard.html.twig');
    }
    public function jobseekerDashboardAction()
    {
        return $this->render('OwbazUserBundle:Jobseekers:dashboard.html.twig');
    }
    //---------------------------------------------------------------------

    private function getEditForm($entity) {
        return $this->createForm(new JobseekerType(), $entity);
    }
   
    //------------------------------------------------------------------------
    private function getJobseeker($id) {
        return $this->getDoctrine()
                        ->getRepository('OwbazUserBundle:User')
                        ->find($id);
    }

    
    
    private function renderJobseeker()
    {
        
    }

}
