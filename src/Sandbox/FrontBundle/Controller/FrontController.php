<?php

namespace Sandbox\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FrontController extends Controller
{
    /**
     * @Route("/", name="home", options={"label"="Home"})
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
