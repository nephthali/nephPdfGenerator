<?php

namespace Cineca\NephPdfBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CinecaNephPdfBundle:Default:index.html.twig', array('name' => $name));
    }
}
