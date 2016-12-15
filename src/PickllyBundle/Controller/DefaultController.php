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
     * @Route("/recup")
     */
    public function recupAction()
    {
        return $this->render('PickllyBundle:Default:camera.html.twig');
    }

    public function classementAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('')->findBy(array(),array('id'=>'DESC'));


        return $this->render('equipe/index.html.twig', array(
            'equipes' => $equipes,
        ));
    }
}
