<?php

namespace Owbaz\EmployerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EmployerController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazEmployerBundle:Default:index.html.twig');
    }
}
