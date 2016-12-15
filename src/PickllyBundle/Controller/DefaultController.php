<?php

namespace PickllyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('PickllyBundle:Default:index.html.twig');
    }


    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/classement")
     */
    public function classementAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('FOS')->findBy(array(),array('id'=>'DESC'));


        return $this->render('@Picklly/Default/classement.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/concour")
     */
    public function concourAction()
    {
        return $this->render('PickllyBundle:Default:concour.html.twig');
    }
}
