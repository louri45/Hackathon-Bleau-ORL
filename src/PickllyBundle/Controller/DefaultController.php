<?php

namespace PickllyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\UserBundle\FOSUserBundle;
use Symfony\Component\HttpFoundation\Response;
use PickllyBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/",  name="index_home")
     */
    public function loginAction()
    {

        return $this->render('PickllyBundle:Default:index.html.twig');
    }

	/**
	 * @Route("/index")
	 */
	public function indexAction()
	{
		return $this->render('PickllyBundle:Default:index.html.twig');
	}


    /**
     * @Route("/classement")
     */
    public function classementAction()    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('PickllyBundle:User')->findBy(array('status'=>'mop'), array('points'=>'DESC'));
        
        return $this->render('@Picklly/Default/classement.html.twig', array(
            'user' => $user,
        ));
    }

    /**
     * @Route("/concour")
     */
    public function concourAction()
    {
        $em = $this->getDoctrine()->getManager();
        $games = $em->getRepository('PickllyBundle:Game')->findall();
        return $this->render('PickllyBundle:Default:concour.html.twig', array(
            'games' => $games
        ));
    }

	/**
	 * @Route("/profile", name="profile")
	 */
	public function profileAction()
	{
		return $this->render('PickllyBundle:Default:profile.html.twig');
	}

	/**
	 * @Route("/show", name="show")
	 */
	public function showAction()
	{
		return $this->render('show.html.twig');
	}
}
