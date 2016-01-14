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
        return $this->render('OwbazUserBundle:Default:index.html.twig');
    }
    
    //-------------------------------add new employer Form------------------------------------------------
    public function NewEmployerAction()
    {
            $entity = new User();
            $form = $this->createForm(new EmployerType(), $entity);
        return $this->render('OwbazUserBundle:Employers:new.html.twig', array(
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
            $password =$request->get('password');
            $entity->setCreatedAt(new \DateTime('now'));
            $entity->setUpdatedAt(new \DateTime('now'));
            $entity->setPassword(md5($password));
            $em->persist($entity);
            $em->flush();
        }
        return $this->render('OwbazUserBundle:Employers:thanks.html.twig');
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
            $password =$request->get('password');
            $entity->setCreatedAt(new \DateTime('now'));
            $entity->setUpdatedAt(new \DateTime('now'));
            $entity->setPassword(md5($password));
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
        $entity = $em->getRepository('OwbazUserBundle:User')->adminLogin($email,md5($password));

        if($entity)
        {

            //$user_name =  $session->set('name', 'Rahul');


            return $this->redirect($this->generateUrl('owbaz_users_dashboard')); // redirect change url of the page
            //  return  $this->render('TalhaBundkhaAdminBundle:Admin:dashboard.html.twig');  render page
        }else
        {
            $this->addFlash(
                'error',
                'Invalid User Name And Password'
            );
            return $this->redirect($this->generateUrl('owbaz_users_login'));

        }
    }

    public function userDashboardAction()
    {
        return $this->render('OwbazUserBundle:User:dashboard.html.twig');
    }
    //--------------------------------------------------------------------- 

    private function getEditForm($entity) {
        return $this->createForm(new JobseekerType(), $entity);
    }

    
}
