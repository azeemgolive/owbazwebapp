<?php

namespace Owbaz\UserBundle\Controller;

use Symfony\Component\Form\FormError;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Owbaz\UserBundle\Entity\User;
use Owbaz\UserBundle\Form\Type\JobseekerType;
use Owbaz\UserBundle\Form\Type\EmployerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;


class RegistrationController extends Controller {

//------------------------- Registration Process ------------------------------------------
    public function registrationAction() {

        //------------------   LOgin form
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(
                    SecurityContext::AUTHENTICATION_ERROR
            );
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

//------------------------ Registration form
        $entity = new User();
        $form = $this->createForm(new JobseekerType(), $entity);
        return $this->render('OwbazUserBundle:Jobseekers:jobseeker_register.html.twig', array(
                    'form' => $form->createView(),
                    'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
                ));
    }

//----------------------------------------------------------------

    public function registrationCreateAction() {
        try {
            $entity = new User();
            $form = $this->createForm(new JobseekerType(), $entity);
            $form->bind($this->getRequest());

            if ($this->isDuplicateEmail(Null, $entity->getEmail())) {
                $form->get('email')->addError(new FormError('This email address has already been taken.'));
            }


            if ($form->isValid()) {

                $entity->setCreatedAt(new \DateTime('now'));
                $entity->setUpdatedAt(new \DateTime('now'));

                $factory = $this->get('security.encoder_factory');
                $encoder = $factory->getEncoder($entity);
                $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
                $entity->setPassword($password);

                $em = $this->getDoctrine()->getManager();

                $em->persist($entity);
                $em->flush();

                return $this->render('OwbazUserBundle:Jobseekers:thanks.html.twig');
            } else {

                return $this->render('OwbazUserBundle:Jobseekers:jobseeker_register.html.twig', array(
                            'form' => $form->createView(),
                            'entity' => $entity));
            }
        } catch (\Doctrine\DBAL\DBALException $e) {

            $form->addError(new FormError('Some thing went wrong'));

            return $this->render('OwbazUserBundle:Jobseekers:jobseeker_register.html.twig', array(
                        'form' => $form->createView(),
                        'entity' => $entity));
        }
    }




    
//-------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------

    



//------------------------- Login after registration------------------------------

    private function getLoggedIn($userEntity) {
        $token = new UsernamePasswordToken($userEntity, null, 'secured_area', array('ROLE_USER'));
        $this->get('security.context')->setToken($token);
    }

//-------------------------------------------------------------------------------------
    private function isDuplicateEmail($id, $email) {
        return $this->getDoctrine()->getRepository('OwbazUserBundle:User')->isDuplicateEmail($id, $email);
    }



}

?>