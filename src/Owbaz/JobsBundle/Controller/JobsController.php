<?php

namespace Owbaz\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JobsController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazJobsBundle:Default:index.html.twig');
    }
}
