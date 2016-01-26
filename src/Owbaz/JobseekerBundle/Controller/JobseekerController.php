<?php

namespace Owbaz\JobseekerBundle\Controller;

use Owbaz\UserBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Owbaz\UserBundle\Form\Type\JobseekerType;
use Owbaz\JobseekerBundle\Form\Type\JobPreferencesType;
use Owbaz\JobseekerBundle\Entity\JobPreferences;
use Owbaz\UserBundle\Entity\UserDocument;
use Owbaz\JobseekerBundle\Form\Type\UserPasswordReset;
use Owbaz\JobseekerBundle\Form\Type\JobseekerImageType;
use Owbaz\UserBundle\Form\Type\DocumentType;
use Symfony\Component\HttpFoundation\Session\Session;



class JobseekerController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazJobseekerBundle:Default:index.html.twig');
    }
    
    public  function editJobseekerAction()
    {

        $user_id = $this->get('security.context')->getToken()->getUser()->getId();

        $entity = $this->getJobsseker($user_id);
        $form = $this->createForm(new JobseekerType(), $entity);
        return $this->render('OwbazJobseekerBundle:Jobseekers:edit_jobseeker.html.twig', array(
            'form' => $form->createView(),
            'entity' => $entity));
    }
    
    //-----------------update jobseeer------------------------------------------------------------
    public function updateJobseekerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
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
        return $this->redirect($this->generateUrl('owbaz_jobseeker_profile_show'));
    }
   //---------------show jobseeker by id--------------------------------------------------------------
    public function showJobseekerAction()
    {
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();

        $entity=  $this->getJobsseker($user_id);
        return $this->render('OwbazJobseekerBundle:Jobseekers:show_jobseeker.html.twig');
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

    //--------------------------------Document Show-------------------------------------------------
    public function documentpageAction()
    {
        return $this->render('OwbazJobseekerBundle:Jobseekers:show_document.html.twig');

    }

    //--------------------------------Document Add-------------------------------------------------
    public function addDocumentAction()
    {
        $entity= new UserDocument();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
        $jobseeker=  $this->getJobsseker($user_id);
        $form = $this->createForm(new DocumentType(), $entity);
        return $this->render('OwbazJobseekerBundle:Jobseekers:add_document.html.twig', array(
            'form' => $form->createView(),
            'jobseeker' => $jobseeker));

    }

    //--------------------------------Document Upload-------------------------------------------------
    public function uploadDocumentAction(Request $request)
    {

        $entity= new UserDocument();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
        $jobseeker=  $this->getJobsseker($user_id);
        $form = $this->createForm(new DocumentType(), $entity);
        $form->bind($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setUsers($jobseeker);
            $entity->setDocumentSize("103303");
            $entity->setCreatedAt(new \DateTime('now'));
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
