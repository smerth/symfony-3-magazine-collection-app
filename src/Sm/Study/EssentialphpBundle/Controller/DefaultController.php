<?php

namespace Sm\Study\EssentialphpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/56")
     */
    public function indexAction()
    {
        $info = "Here's a complicated way to echo some text to screen";

        return $this->render('SmStudyEssentialphpBundle:Default/index.html.twig', array(
            'info' => $info,
        ));
    }

    /**
     * @Route("/57")
     */
    public function lesson57Action()
    {
        $output = "Hello" . "World!";

        $notes = "Concatenate two things using a dot . ";




        return $this->render('SmStudyEssentialphpBundle:Default/index.html.twig', array(
            'output' => $output,
            'notes' => $notes,
          
            
        ));
    }
}
