<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use AppBundle\Entity\Blog;

class BlogController extends Controller
{


    /**
    * @Route("/blogs", name="blog_list")
    */
    public function listAction(Request $request)
    {
        $blogs = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->findAll();
        
        return $this->render('Blogs/index.html.twig', array(
            'blogs' => $blogs
            
        ));
    }


    /**
    * @Route("/blogs/create", name="blog_create")
    */
    public function createAction(Request $request)
    {
        $blog = new Blog;
      
        $form = $this->createFormBuilder($blog)
        ->add('slug', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Create Blog', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();
        
        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()){
            $slug = $form['slug']->getData();
            $title = $form['title']->getData();
            $description = $form['description']->getData();
           
            

            
            $now = new\DateTime('now');  
            
            $blog->setSlug($slug);
            $blog->setTitle($title);          
            $blog->setDescription($description);

            $blog->setCreateDate($now);    
            
            $sn = $this->getDoctrine()->getManager();      
            $sn -> persist($blog);
            $sn -> flush();
            
            $this->addFlash(
                'notice',
                'Blog Added'
            );
            return $this->redirectToRoute('blog_list');            
           
        }
        
        return $this->render('Blogs/Create.html.twig', array(
            'form' => $form->createView()
            
        ));
    }


    /**
    * @Route("/blogs/edit/{id}", name="blog_edit")
    */
    public function editAction($id,Request $request)
    {
        $now = new\DateTime('now');  
        $blog = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->find($id);

        $blog->setTitle($blog->getTitle());
        $blog->setSlug($blog->getSlug());          
        $blog->setDescription($blog->getDescription());      
        $blog->setCreateDate($now);        

        $form = $this->createFormBuilder($blog)
        ->add('title', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('slug', TextType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('description', TextareaType::class, array('attr' => array('class' => 'form-control', 'style' => 'margin-bottom:15px')))
        ->add('Save', SubmitType::class, array('label'=> 'Update Blog', 'attr' => array('class' => 'btn btn-primary', 'style' => 'margin-bottom:15px')))
        ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() &&  $form->isValid()){
        $title = $form['title']->getData();
        $slug = $form['slug']->getData();
        $description = $form['description']->getData();



        $sn = $this->getDoctrine()->getManager();
        $blog = $sn->getRepository('AppBundle:Blog')->find($id);

        $blog->setTitle($title);
        $blog->setSlug($slug);          
        $blog->setDescription($description);                            
        $blog->setCreateDate($now);          

        $sn -> flush();

        $this->addFlash(
            'notice',
            'Blog Updated'
        );
        return $this->redirectToRoute('blog_list');            

        }

        return $this->render('Blogs/edit.html.twig', array(
        'blog' => $blog,
        'form' => $form->createView()
        ));      
    }


    /**
    * @Route("/blogs/delete/{id}", name="blog_delete")
    */ 
    public function deleteAction($id)
    {
        
         $sn = $this->getDoctrine()->getManager();
         $blog = $sn->getRepository('AppBundle:Blog')->find($id);
         
         $sn->remove($blog);
         $sn->flush();
        
         $this->addFlash(
                'notice',
                'Blog Removed'
            );
          return $this->redirectToRoute('blog_list');             
    }



    /**
    * @Route("/blogs/details/{id}", name="blog_details")
    */
    public function detailsAction($id)
    {
        $blog = $this->getDoctrine()
        ->getRepository('AppBundle:Blog')
        ->find($id);
            
        return $this->render('Blogs/details.html.twig', array(
            'blog' => $blog
        ));
    }
}
