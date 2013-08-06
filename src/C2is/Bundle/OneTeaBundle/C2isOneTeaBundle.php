<?php

namespace C2is\Bundle\OneTeaBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * This bundle is meant to be a home for front end developers in the project.
 *
 * Adds a route /html where are displayed the twig templates placed in the Resources/views/pages directory of this bundle.
 * Allows for development of HTML templates independently from the application.
 *
 * To use this bundle :
 * Place your pages templates in the Resources/views/pages directory. These page templates must be named *.html.twig.
 * Place any public asset in the Resources/public directory (eg. Resources/public/css/styles.css). After editing any file in the public directory, run the ./app/console assets:install command for it to be copied into the web/ directory and be taken into account when displaying the actual page.
 *
 * The /html route displays a list of links to the pages templates. Only *.html.twig files present in the Resources/views/pages directory are displayed.
 *
 * Class C2isHtmlBundle
 * @package C2is\Bundle\OneTeaBundle
 */
class C2isOneTeaBundle extends Bundle
{
}
