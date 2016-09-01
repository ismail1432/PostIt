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

    		$request->getSession()->getFlashbag()->add('notice', 'Annonce bien enregistrée.');

    		return $this->redirectToRoute('postit_announce_view', array('id' => $announce->getId()));
    	}
    	return $this->render('PostItAnnounceBundle:Announce:add.html.twig', array(
      'form' => $form->createView(),
    ));
  }


}
