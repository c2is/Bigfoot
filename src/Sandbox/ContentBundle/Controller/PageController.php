<?php

namespace Sandbox\ContentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Bigfoot\Bundle\CoreBundle\Controller\BaseController;
use Bigfoot\Bundle\ContentBundle\Entity\Page;

class PageController extends BaseController
{
    /**
     * @Route("/page/{slug}", name="page_show", options={"label"="Page", "parameters"={{"name"="slug", "type"="BigfootContentBundle:Page", "label"="name", "value"="slug"}}})
     * @Template()
     */
    public function showAction(Page $page)
    {
        return array(
            'page' => $page
        );
    }
}