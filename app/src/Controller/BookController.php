<?php

namespace App\Controller;

use App\Entity\Books;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{

    /**
     * @Route("/books")
     */
    public function start(): Response
    {

        $books = $this->getDoctrine()->getRepository(Books::class)->findAll();

        return $this->render('books.html.twig', [
            'books' => $books,
        ]);
    }


    // /**
    //  * @Route("/books/save")
    //  */
    // public function save(): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $book = new Books();
    //     $book->setName('JavaScript Everywhere');
    //     $book->setIsbn('9781492046981');
    //     $book->setAuthor('Adam D Scott');
    //     $book->setImg('https://image.bokus.com/images/9781492046981_200x_javascript-everywhere_haftad');

    //     $entityManager->persist($book);
    //     $entityManager->flush();

    //     return new Response('Saved' . $book->getId());
    // }
}
