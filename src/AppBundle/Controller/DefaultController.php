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
    * @Route("/blog/{slug}", name="blog_view")
    */
    public function detailsAction($slug)
    {
       

        $blog = $this->getDoctrine()
                    ->getRepository('AppBundle:Blog')
                    ->findOneBy(array(
                                    'slug' => $slug,
        ));
            
        return $this->render('default/view.html.twig', array(
            'blog' => $blog
        ));
    }
    
}
