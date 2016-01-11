<?php

namespace Owbaz\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazSiteBundle:Default:index.html.twig');
    }
}
