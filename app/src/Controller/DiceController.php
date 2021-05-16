<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DiceController extends AbstractController
{

    /**
     * @Route("/dice")
     */
    public function start(): Response
    {
        return $this->render('dice.html.twig', [
            'message' => "dice",
        ]);
    }
}
