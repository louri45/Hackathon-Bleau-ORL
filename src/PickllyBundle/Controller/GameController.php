<?php

namespace PickllyBundle\Controller;

use PickllyBundle\Entity\Game;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Game controller.
 *
 * @Route("game")
 */
class GameController extends Controller
{
    /**
     * Lists all game entities.
     *
     * @Route("/", name="game_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $games = $em->getRepository('PickllyBundle:Game')->findAll();

        return $this->render('game/index.html.twig', array(
            'games' => $games,
        ));
    }

    /**
     * Creates a new game entity.
     *
     * @Route("/new", name="game_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $game = new Game();
        $user = $this->getUser();
        $form = $this->createForm('PickllyBundle\Form\GameType', $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $game->getImage();
            $fileName = md5(uniqid()) .'.'. $file->guessExtension();
            $game->setImage($fileName);
            $file->move(
                $this->getParameter('app.path.product_images'),
                $fileName
            );
            $em = $this->getDoctrine()->getManager();
            $game->setUsers($user);
            $em->persist($game);
            $em->flush($game);

            return $this->redirectToRoute('game_show', array(
                'id' => $game->getId(),
            ));
        }

        return $this->render('game/new.html.twig', array(
            'game' => $game,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a game entity.
     *
     * @Route("/{id}", name="game_show")
     * @Method("GET")
     */
    public function showAction(Game $game)
    {
        $deleteForm = $this->createDeleteForm($game);

        return $this->render('game/show.html.twig', array(
            'game' => $game,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing game entity.
     *
     * @Route("/{id}/edit", name="game_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Game $game)
    {

        $deleteForm = $this->createDeleteForm($game);
        $editForm = $this->createForm('PickllyBundle\Form\GameType', $game);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file = $game->getImage();
            if (!is_null($file)  and !empty($file)) {
                $fileName = md5(uniqid()) . '.' . $file->guessExtension();
                $game->setImage($fileName);
                $file->move(
                    $this->getParameter('app.path.product_images'),
                    $fileName
                );
            }elseif (isset($file)) {
                $game->setImage(basename($file));
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

        }

        return $this->render('game/edit.html.twig', array(
            'game' => $game,
            'imagepath'=>basename($game->getImage()),
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a game entity.
     *
     * @Route("/{id}", name="game_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Game $game)
    {
        $form = $this->createDeleteForm($game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($game);
            $em->flush($game);
        }

        return $this->redirectToRoute('game_index');
    }

    /**
     * Creates a form to delete a game entity.
     *
     * @param Game $game The game entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Game $game)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('game_delete', array('id' => $game->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * Finds and displays a game entity.
     *
     * @Route("/parties", name="game_all")
     * @Method("GET")
     */
private function listingAction()
    {
        $em = $this->getDoctrine()->getManager();

        $games = $em->getRepository('PickllyBundle:Game')->findAll();

        return $this->render('game/index.html.twig', array(
            'games' => $games,
        ));
    }
    
}
