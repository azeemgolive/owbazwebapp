<?php

namespace Owbaz\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Owbaz\JobsBundle\Entity\Jobs;

class JobsController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OwbazJobsBundle:Jobs')->getAllJobs();
        return $this->render('OwbazJobsBundle:Jobs:index.html.twig',array('jobs'=>$entity));
    }
}
