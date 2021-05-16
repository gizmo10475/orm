<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Dice\DiceGraphic;
use App\Entity\Highscore;


class YatzyController extends AbstractController
{

    /**
     * @Route("/yatzy", name="yatzy")
     */
    public function start(SessionInterface $session): Response
    {
        $session->set('dice1status', true);
        $session->set('dice2status', true);
        $session->set('dice3status', true);
        $session->set('dice4status', true);
        $session->set('dice5status', true);
        $session->set('yatzythrows', 1);
        $session->set('totalones', 0);
        $session->set('totaltwos', 0);
        $session->set('totalthrees', 0);
        $session->set('totalfours', 0);
        $session->set('totalfives', 0);
        $session->set('totalsixes', 0);
        $session->set('totalpoints', 0);
        $session->set('bonus', 0);
        $session->set('totalSum', 0);
        $session->set('listan', []);
        $session->set('counter', 0);

        return $this->render('yatzy.html.twig');
    }


    /**
     * @Route("/yatzygame", name="yatzygame")
     */
    public function startgame(SessionInterface $session, Request $request): Response
    {
        $dice = new DiceGraphic();
        $res = [];


        if ($request->get('tärning1')) {
            $session->set('dice1status', false);
        }
        if ($request->get('tärning2')) {
            $session->set('dice2status', false);
        }
        if ($request->get('tärning3')) {
            $session->set('dice3status', false);
        }
        if ($request->get('tärning4')) {
            $session->set('dice4status', false);
        }
        if ($request->get('tärning5')) {
            $session->set('dice5status', false);
        }

        if ($request->get('submit')) {
            return $this->redirectToRoute('yatzygame');
        }


        if ($session->get('dice1status')) {
            $die = $dice->roll();
            $session->set('dice1value', $dice->graphic());
        }
        if ($session->get('dice2status')) {
            $die = $dice->roll();
            $res[] = $die;
            $session->set('dice2value', $dice->graphic());
        }
        if ($session->get('dice3status')) {
            $die = $dice->roll();
            $res[] = $die;
            $session->set('dice3value', $dice->graphic());
        }
        if ($session->get('dice4status')) {
            $die = $dice->roll();
            $res[] = $die;
            $session->set('dice4value', $dice->graphic());
        }
        if ($session->get('dice5status')) {
            $die = $dice->roll();
            $res[] = $die;
            $session->set('dice5value', $dice->graphic());
        }

        $session->set('listan', []);
        $session->set('listan', [$session->get('dice1value'), $session->get('dice2value'), $session->get('dice3value'), $session->get('dice4value'), $session->get('dice5value')]);

        $localcounter = $session->get('counter');
        $localscore = $session->get('totalpoints');

        if ($session->get('yatzythrows') == 3) {
            foreach ($session->get('listan') as $value) {
                if (substr($value, -1) == 1) {
                    $session->set('counter', $localcounter += 1);
                }
            }
            $session->set('totalones', $session->get('counter'));
            $session->set('totalpoints', $session->get('totalones'));
        } elseif ($session->get('yatzythrows') > 3 and $session->get('yatzythrows') < 6) {
            $session->set('counter', 0);
        } elseif ($session->get('yatzythrows') == 6) {
            foreach ($session->get('listan') as $value) {
                if (substr($value, -1) == 2) {
                    $session->set('counter', $localcounter += 2);
                }
            }
            $session->set('totaltwos', $session->get('counter'));
            $session->set('totalpoints', $localscore += $session->get('totaltwos'));
        } elseif ($session->get('yatzythrows') > 6 and $session->get('yatzythrows') < 9) {
            $session->set('counter', 0);
        } elseif ($session->get('yatzythrows') == 9) {
            foreach ($session->get('listan') as $value) {
                if (substr($value, -1) == 3) {
                    $session->set('counter', $localcounter += 3);
                }
            }
            $session->set('totalthrees', $session->get('counter'));
            $session->set('totalpoints', $localscore += $session->get('totalthrees'));
        } elseif ($session->get('yatzythrows') > 9 and $session->get('yatzythrows') < 12) {
            $session->set('counter', 0);
        } elseif ($session->get('yatzythrows') == 12) {
            foreach ($session->get('listan') as $value) {
                if (substr($value, -1) == 4) {
                    $session->set('counter', $localcounter += 4);
                }
            }
            $session->set('totalfours', $session->get('counter'));
            $session->set('totalpoints', $localscore += $session->get('totalfours'));
        } elseif ($session->get('yatzythrows') > 12 and $session->get('yatzythrows') < 15) {
            $session->set('counter', 0);
        } elseif ($session->get('yatzythrows') == 15) {
            foreach ($session->get('listan') as $value) {
                if (substr($value, -1) == 5) {
                    $session->set('counter', $localcounter += 5);
                }
            }
            $session->set('totalfives', $session->get('counter'));
            $session->set('totalpoints', $localscore += $session->get('totalfives'));
        } elseif ($session->get('yatzythrows') > 15 and $session->get('yatzythrows') < 18) {
            $session->set('counter', 0);
        } elseif ($session->get('yatzythrows') == 18) {
            foreach ($session->get('listan') as $value) {
                if (substr($value, -1) == 6) {
                    $session->set('counter', $localcounter += 6);
                }
            }
            $session->set('totalsixes', $session->get('counter'));
            $session->set('totalpoints', $localscore += $session->get('totalsixes'));


            if ((int)$session->get('totalpoints') >= 63) {
                $session->set('bonus', 50);
            }
            $session->set('totalSum', ($session->get('totalpoints') + $session->get('bonus')));

            if ((int)$session->get('totalSum') >= 50) {
                $entityManager = $this->getDoctrine()->getManager();

                $highscore = new Highscore();
                $highscore->setScore($session->get('totalSum'));

                $entityManager->persist($highscore);
                $entityManager->flush();

            }

        }

        $session->set('dice1status', true);
        $session->set('dice2status', true);
        $session->set('dice3status', true);
        $session->set('dice4status', true);
        $session->set('dice5status', true);
        $throws = $session->get('yatzythrows');
        $session->set('yatzythrows', $throws += 1);



        return $this->render('yatzygame.html.twig');
    }
}
