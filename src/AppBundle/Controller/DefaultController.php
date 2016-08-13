<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    // 
    //  Route("/", name="homepage")
    //  
    // public function indexAction(Request $request)
    // {
    //     // replace this example code with whatever you need
    //     return $this->render('default/index.html.twig', array(
    //         'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
    //     ));
    // }

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
        return $this->render('AppBundle:default:test.html.twig');
    }

    /**
     * @Route("/some", name="some")
     */
    public function someAction(Request $request)
    {
        return $this->render('AppBundle:default:some.html.twig');
    }

}
