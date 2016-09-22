<?php

namespace Sm\Study\OopSymfonyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
$trap = "IT'S A TRAAAAAAPPPP!";

        return $this->render('SmStudyOopSymfonyBundle:Default:index.html.twig', array(
            'trap' => $trap,
        ));

    }
}
