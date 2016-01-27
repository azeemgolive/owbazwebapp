<?php

namespace Owbaz\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Owbaz\JobsBundle\Entity\Jobs;
use Owbaz\JobsBundle\Form\Type\EmployerJobType;
use Owbaz\UserBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class JobsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OwbazJobsBundle:Jobs')->getAllJobs();
        return $this->render('OwbazJobsBundle:Jobs:index.html.twig',array('jobs'=>$entity));
    }
    
    public function latestJobsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OwbazJobsBundle:Jobs')->getAllLatestJobs();
        return $this->render('OwbazJobsBundle:Jobs:latest_jobs.html.twig',array('jobs'=>$entity));
    }
    
    //----------------------add new jobs-------------------------------------------------------
    public function addNewJobAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('OwbazUserBundle:User')->find($user_id);
        $jobs = new Jobs();
        $form = $this->createForm(new EmployerJobType(), $jobs);
        return $this->render('OwbazJobsBundle:Jobs:new_job.html.twig', array(
            'form' => $form->createView()));
    }
    
    public function createNewJobAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user_id = $this->get('security.context')->getToken()->getUser()->getId();
        $entity = $em->getRepository('OwbazUserBundle:User')->find($user_id);
        $jobs = new Jobs();
        $form = $this->createForm(new EmployerJobType(), $jobs);
        $form->bind($request);
        if($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $jobs->setUsers($entity);
            $jobs->setCreatedAt(new \DateTime('now'));
            $jobs->setUpdatedAt(new \DateTime('now'));             
            $em->persist($jobs);
            $em->flush();

            return $this->redirect($this->generateUrl('owbaz_jobseeker_dashboard'));
        }else
        {           
           return $this->render('OwbazJobsBundle:Jobs:new_job.html.twig', array(
            'form' => $form->createView()));
        }
    }
    
    public function showAction($job_id)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OwbazJobsBundle:Jobs')->find($job_id);
        return $this->render('OwbazJobsBundle:Jobs:show.html.twig',array('job'=>$entity));
    }
}
