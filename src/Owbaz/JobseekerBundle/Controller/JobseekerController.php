<?php

namespace Owbaz\JobseekerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JobseekerController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazJobseekerBundle:Default:index.html.twig');
    }
}
