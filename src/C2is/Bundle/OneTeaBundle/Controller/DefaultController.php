<?php

namespace C2is\Bundle\OneTeaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Finder\Finder;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package C2is\Bundle\OneTeaBundle\Controller
 * @Route("/html")
 */
class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template("C2isOneTeaBundle::index.html.twig")
     */
    public function indexAction()
    {
        $templates = array();

        $finder = new Finder();
        $finder->files()->in(__DIR__.'/../Resources/views')->path('pages')->name('*.html.twig')->sortByName();

        foreach ($finder as $file) {
            $templates[preg_replace('/\//', ':', $file->getRelativePathname(), 1)] = $file->getRelativePathname();
        }

        return array('templates' => $templates);
    }

    /**
     * @Route("/{template}", name="html_page")
     */
    public function htmlPageAction($template)
    {
        return new Response($this->get('twig')->render(sprintf('C2isOneTeaBundle:%s', urldecode($template))));
    }
}
