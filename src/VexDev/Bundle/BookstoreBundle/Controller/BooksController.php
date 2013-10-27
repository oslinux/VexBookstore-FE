<?php

namespace VexDev\Bundle\BookstoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class BooksController extends Controller
{
    /**
     * @Route("/books")
     * @Template("VexBookstoreBundle:Default:bookList.html.twig")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Book');
        $books = $repository->findAll();

        return array('books' => $books);
    }
}
