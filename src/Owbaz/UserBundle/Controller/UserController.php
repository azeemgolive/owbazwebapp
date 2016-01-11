<?php

namespace Owbaz\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class UserController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('OwbazUserBundle:Default:index.html.twig');
    }
}
