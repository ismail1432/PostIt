<?php

namespace PostIt\AnnounceBundle\Controller;

use PostIt\AnnounceBundle\Entity\Announce;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;


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
}
