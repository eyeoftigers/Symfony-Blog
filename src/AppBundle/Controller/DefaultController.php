<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
    * @Route("/", name="homepage")
    */
    public function indexAction(Request $request)
    {
        
        $blogs = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->findAll();

        return $this->render('default/blogs.html.twig', [
           'blogs' => $blogs 
        ]);
    }

    /**
    * @Route("/blog/{id}", name="blog_view")
    */
    public function detailsAction($id)
    {
        $blog = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->find($id);
            
        return $this->render('default/view.html.twig', array(
            'blog' => $blog
        ));
    }
    
}
