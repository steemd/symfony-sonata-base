<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{    
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle::base.html.twig');
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(Request $request)
    {
       
       $posts = $this->getDoctrine()->getRepository('AppBundle:BlogPost')->findAll();
       $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();

        return $this->render('AppBundle:default:test.html.twig', array('posts' => $posts, 'categories' => $categories));
    }

    /**
     * @Route("/some", name="some")
     */
    public function someAction(Request $request)
    {
        // show parameters

        $fname = $this->getParameter('fname');
        $lname = $this->getParameter('lname');

        return $this->render('AppBundle:default:some.html.twig', array('fname' => $fname, 'lname' => $lname));
    }

}
