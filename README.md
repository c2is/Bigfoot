Bigfoot
=======

The Bigfoot administration interface.
Demo application using Bigfoot bundles to setup a BackOffice application. Based on symfony2 and symfony/symfony-standard.

Installation
------------

Clone this project :

    git clone git@github.com:c2is/Bigfoot.git your_project

Install dependencies using composer :

    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

If you didn't set it up during the composer install, setup your database through the Symfony standard distribution configuration web interface :

    /app_dev.php/_configurator/step/0

Load the schema and the fixtures to create your admin user :

    ./app/console doctrine:schema:update --force
    ./app/console doctrine:fixtures:load


Usage
-----

The administration interface is then available at /admin.

Bigfoot comes with the SEO and User plugins.
By default, an authentication is required to access (if you loaded the bundled fixtures, you can use the admin / admin account).
Feel free to change the authentication configuration in app/Resources/config/security.yml to fit your needs, though be advised that the BigfootUserBundle features won't be usable if your User class doesn't extend the Bigfoot\Bundle\UserBundle\Model\BigfootUser class.

You should create a new admin user and delete the one loaded with the BigfootUserBundle fixtures if your application is accessible from the outside.

You can comment the content of the app/Resources/config/security.yml file to disable the authentication on the application.
