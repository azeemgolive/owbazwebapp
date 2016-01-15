<?php

namespace Owbaz\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SiteController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwbazSiteBundle:Home:index.html.twig');
    }
}
