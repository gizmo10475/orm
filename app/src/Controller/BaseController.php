<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{

    /**
     * @Route("/")
     */
    public function start(): Response
    {

        return $this->render('start.html.twig', [
            'message' => "hello",
        ]);
    }

    /**
     * @Route("/home")
     */
    public function home(): Response
    {

        return $this->render('start.html.twig', [
            'message' => "hello",
        ]);
    }
}
