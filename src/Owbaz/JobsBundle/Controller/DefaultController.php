<?php

namespace Owbaz\JobsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazJobsBundle:Default:index.html.twig');
    }
}
