<?php

namespace PostIt\AnnounceBundle\Controller;

use PostIt\AnnounceBundle\Entity\Announce;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use PostIt\AnnounceBundle\Form\AnnounceType;

class AnnounceController extends Controller
{
    public function indexAction()
    {	
    	$em = $this->getDoctrine()->getManager();
    	$listAnnounces = $em->getRepository('PostItAnnounceBundle:Announce')->getAll();
        
        return $this->render('PostItAnnounceBundle:Announce:index.html.twig',
        		array('listAnnounces' => $listAnnounces)
        	);
    }

    public function viewAction(Announce $announce){
		return $this->render('PostItAnnounceBundle:Announce:view.html.twig',
        		array('announce' => $announce)
        	);  	
    }

    public function addAction(Request $request){
    	$announce = new Announce;
    	$form = $this->createForm(AnnounceType::class, $announce);

    	if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
    		$em = $this->getDoctrine()->getManager();
    		$em->persist($announce);
    		$em->flush();

    		$request->getSession()->getFlashbag()->add('notice', 'Voici votre annonce en attente de validation.');

    		return $this->redirectToRoute('postit_announce_view', array('id' => $announce->getId()));
    	}
    	return $this->render('PostItAnnounceBundle:Announce:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }

  	public function deleteAction(Announce $announce, Request $request){

  		$form = $this->createFormBuilder()->getForm();
  		$passwordAnnounce = $announce->getUser()->getPassword();

  			if((($request->isMethod('POST')) && ($form->handleRequest($request)->isValid())) && ($passwordAnnounce == $_POST['motdepasse'])){

	  					$em = $this->getDoctrine()->getManager();
	    				$em->remove($announce);
	    				$em->flush();
	    				
	    				$request->getSession()->getFlashBag()->add('notice', "Annonce bien supprimée");
      					return $this->redirect($this->generateUrl('postit_announce_home'));	
	    				
	    }
	    				else{

  							if(($request->isMethod('POST')) && ($passwordAnnounce != $_POST['motdepasse']))
  							{
  								$request->getSession()->getFlashBag()->add('notice', "Mauvais mot de passe");
  							}
      					return $this->render('PostItAnnounceBundle:Announce:delete.html.twig',
        				array('announce' => $announce,
        				'form' => $form->createView(),
        				'pass' => $passwordAnnounce
        			));
  				}
  	}


}
