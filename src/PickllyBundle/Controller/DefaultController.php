<?php

namespace PickllyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

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

    /**
     * @Route("/concour")
     */
    public function concourAction()
    {
        return $this->render('PickllyBundle:Default:concour.html.twig');
    }
}
