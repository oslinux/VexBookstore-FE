<?php

namespace VexDev\Bundle\BookstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     * @Template("VexBookstoreBundle:Default:index.html.twig")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Category');
        $categories = $repository->findAll();
        return array('categories' => $categories);
    }
}
