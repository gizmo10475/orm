<?php

namespace App\Controller;

use App\Entity\Highscore;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HighscoreController extends AbstractController
{

    /**
     * @Route("/highscore")
     */
    public function start(): Response
    {

        $highscore = $this->getDoctrine()->getRepository(Highscore::class)->findAll();

        return $this->render('highscore.html.twig', [
            'highscore' => $highscore,
        ]);
    }


    // /**
    //  * @Route("/highscore/save")
    //  */
    // public function save(): Response
    // {
    //     $entityManager = $this->getDoctrine()->getManager();

    //     $highscore = new Highscore();
    //     $highscore->setScore('99');

    //     $entityManager->persist($highscore);
    //     $entityManager->flush();

    //     return new Response('Saved' . $highscore->getId());
    // }
}
