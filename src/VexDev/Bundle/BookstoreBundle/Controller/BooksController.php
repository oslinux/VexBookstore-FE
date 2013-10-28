<?php

namespace VexDev\Bundle\BookstoreBundle\Controller;

use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/books")
 */
class BooksController extends Controller
{
    /**
     * @Route("", name="books")
     * @Template("VexBookstoreBundle:Book:list.html.twig")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Book');
        $books = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Category');
        $categories = $repository->findAll();

        return array('books' => $books, 'categories' => $categories);
    }

    /**
     * @Route("/search", name="search", defaults={"q" = ""})
     * @Method("GET")
     * @Template("VexBookstoreBundle:Book:search.html.twig")
     */
    public function search()
    {
        $request = $this->getRequest();
        $q = $request->query->get('q');
        /* Here i'm using Native SQL because Doctrine does not support MySQL's Fulltext Searches. */
        $em = $this->getDoctrine()->getManager();
        $sql = 'SELECT *, MATCH(name, description) AGAINST (? IN NATURAL LANGUAGE MODE) AS score FROM book b HAVING score > 0 ORDER BY score DESC LIMIT 10';
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('VexBookstoreBundle:Book', 'b');

        $query = $em->createNativeQuery($sql, $rsm)->setParameter(1, $q);
        $books = $query->getResult();

        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Category');
        $categories = $repository->findAll();

        return array('books' => $books, 'search' => $q, 'categories' => $categories);
    }

    /**
     * @Route("/book/{isbn}", name="book", defaults={"isbn" = ""})
     * @Template("VexBookstoreBundle:Book:book.html.twig")
     */
    public function book($isbn)
    {
        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Book');
        $book = $repository->find($isbn);
        $repository = $this->getDoctrine()->getRepository('VexBookstoreBundle:Category');
        $categories = $repository->findAll();
        return array('book' => $book, 'categories' => $categories);
    }
}
