<?php

namespace Sm\Study\EssentialphpBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HelloController extends Controller
{
  /**
   * @Route("/hello/{name}")
   * @Template()
   */
  public function helloAction($name)
  {
      return array('name' => $name, );

  }
}
