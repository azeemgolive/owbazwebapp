<?php

namespace Owbaz\JobseekerBundle\Controller;

use Owbaz\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Owbaz\UserBundle\Form\Type\JobseekerType;
use Owbaz\JobseekerBundle\Form\Type\JobPreferencesType;
use Owbaz\JobseekerBundle\Entity\JobPreferences;
use Owbaz\JobseekerBundle\Form\Type\UserPasswordReset;
use Owbaz\JobseekerBundle\Form\Type\JobseekerImageType;



class JobseekerController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazJobseekerBundle:Default:index.html.twig');
    }
    
    public  function editJobseekerAction($user_id)
    {
        $entity = $this->getJobsseker($user_id);
        $form = $this->createForm(new JobseekerType(), $entity);
        return $this->render('OwbazJobseekerBundle:Jobseekers:edit_jobseeker.html.twig', array(
            'form' => $form->createView(),
            'entity' => $entity));
    }
    
    //-----------------update jobseeer------------------------------------------------------------
    public function updateJobseekerAction(Request $request, $user_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $this->getJobsseker($user_id);
        if (!$entity) {
            $this->get('session')->setFlash('warning', 'Unable to find Jobseeker.');            
        }
        $form = $this->createForm(new JobseekerType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {

            $entity->setUpdatedAt(new \DateTime('now'));
            $em->persist($entity);
            $em->flush();
        }
        return $this->redirect($this->generateUrl('owbaz_jobseeker_profile_show', array('user_id' => $entity->getId())));
    }
   //---------------show jobseeker by id--------------------------------------------------------------
    public function showJobseekerAction($user_id)
    {
        $entity=  $this->getJobsseker($user_id);
        return $this->render('OwbazJobseekerBundle:Jobseekers:show_jobseeker.html.twig', array(
            'jobseeker' => $entity));
        //return $this->redirect($this->generateUrl('owbaz_jobseeker_profile_show', array('user_id' => $entity->getId())));
    }

   //--------------------------------job preference-------------------------------------------------
    public function jobPreferencesAction($user_id)
    {
        $entity= new JobPreferences();
        $jobseeker=  $this->getJobsseker($user_id);
        $form = $this->createForm(new JobPreferencesType(), $entity);
        return $this->render('OwbazJobseekerBundle:Jobseekers:job_preferences.html.twig', array(
            'form' => $form->createView(),
            'jobseeker' => $jobseeker));
    }
    
    //-----------------------------add/update job seeker job preference------------------------------
    public function jobPreferencesUpdateAction(Request $request, $user_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity= new JobPreferences();
        $jobseeker=  $this->getJobsseker($user_id);
        if (!$jobseeker) {
            $this->get('session')->setFlash('warning', 'Unable to find Jobseeker.');            
        }        
        $form = $this->createForm(new JobPreferencesType(), $entity);       
        $form->bind($request);
        if ($form->isValid()) {
            $entity->setUsers($jobseeker);
            $em->persist($entity);
            $em->flush();   
             return $this->redirect($this->generateUrl('owbaz_jobseeker_profile_show', array('user_id' => $jobseeker->getId())));
        }else
        {
            return $this->render('OwbazJobseekerBundle:Jobseekers:job_preferences.html.twig', array(
            'form' => $form->createView(),
            'jobseeker' => $jobseeker));
        }
       
    }
    
    //----------------------------------change password form------------------------------------------
    public function jobseekerPasswordAction($user_id)
    {
        $entity    =  $this->getJobsseker($user_id);
        $form      =  $form = $this->createForm(new UserPasswordReset(), $entity);  
        return $this->render('OwbazJobseekerBundle:Jobseekers:password_change.html.twig', array(
            'form' => $form->createView(),
            'jobseeker' => $entity));  
    }
    
    //----------------------------------update password----------------------------------------------
    public function updateJobseekerPasswordAction(Request $request,$user_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity    =  $this->getJobsseker($user_id);
        $form      =  $form = $this->createForm(new UserPasswordReset(), $entity); 
        $form->bind($request);
        if ($form->isValid()) {
            $entity->setUpdatedAt(new \DateTime('now'));
            $em->persist($entity);
            $em->flush();   
             return $this->redirect($this->generateUrl('owbaz_jobseeker_profile_show', array('user_id' => $entity->getId())));
        }else
        {
           return $this->render('OwbazJobseekerBundle:Jobseekers:password_change.html.twig', array(
            'form' => $form->createView(),
            'jobseeker' => $entity)); 
        }
    }    
    
   public function jobseekerUploadImageAction($user_id)
   {
      $entity    =  $this->getJobsseker($user_id);
      $form      =  $form = $this->createForm(new JobseekerImageType(), $entity); 
      return $this->render('OwbazJobseekerBundle:Jobseekers:upload_image.html.twig', array(
            'form' => $form->createView(),
            'jobseeker' => $entity)); 
   }

   public function uploadJobseekerImageAction(Request $request,$user_id)
   {      
      $entity    =  $this->getJobsseker($user_id);
      $form      =  $form = $this->createForm(new JobseekerImageType(), $entity); 
      $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setUpdatedAt(new \DateTime('now'));
            $entity->upload();
            $em->persist($entity);
            $em->flush();   
        }
   }
   

    //--------------------------get jobseeker by id--------------------------------------------------
    private function getJobsseker($user_id)
    {
         return $this->getDoctrine()
                        ->getRepository('OwbazUserBundle:User')
                        ->find($user_id);    
    }
}
