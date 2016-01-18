<?php

namespace Owbaz\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Owbaz\SiteBundle\Entity\Clients;

class SiteController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('OwbazSiteBundle:Clients')->getAllClients();
        return $this->render('OwbazSiteBundle:Home:index.html.twig', array(
            'clients' =>$entity));
    }
    
    public function allClientsAction()
    {
        $clients =new Clients();
        return $this->render('OwbazUserBundle:Employers:new.html.twig', array(
            'clients' =>$clients));
    }

    public function registerAction()
    {
        return $this->render('OwbazSiteBundle:Home:register.html.twig');
    }
}
