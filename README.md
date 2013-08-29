Bigfoot
=======

The Bigfoot administration interface.
Demo application using Bigfoot bundles to setup a BackOffice application. Based on symfony2 and symfony/symfony-standard.

Installation
------------

Clone this project :

    git clone git@github.com:c2is/Bigfoot.git your_project

Install dependencies using composer :

    cd your_project
    curl -sS https://getcomposer.org/installer | php
    php composer.phar install

**If you didn't set it up during the composer install**, setup your database through the Symfony standard distribution configuration web interface :

    /app_dev.php/_configurator/step/0
    
If you're using a database you didn't previously create, Doctrine can do it for you (this is a safe command you can use even if the database already exists) :

    ./app/console doctrine:database:create

Load the schema and the fixtures :

    ./app/console doctrine:schema:update --force
    ./app/console doctrine:fixtures:load

Set permissions on cache and logs directories

    sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache/
    sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache/
    sudo setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/logs/
    sudo setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/logs/

On Macosx rather do this way

    sudo chmod -R +a "_www allow delete,write,append,file_inherit,directory_inherit" app/cache/
    sudo chmod -R +a "_www allow delete,write,append,file_inherit,directory_inherit" app/logs/

Usage
-----

The administration interface is then available at /admin.

Bigfoot comes with the SEO and User plugins.
By default, an authentication is required to access (if you loaded the bundled fixtures, you can use the admin / admin account).
Feel free to change the authentication configuration in app/Resources/config/security.yml to fit your needs, though be advised that the BigfootUserBundle features won't be usable if your User class doesn't extend the Bigfoot\Bundle\UserBundle\Model\BigfootUser class.

You should create a new admin user and delete the one loaded with the BigfootUserBundle fixtures if your application is accessible from the outside.

You can comment the content of the app/Resources/config/security.yml file to disable the authentication on the application.


Assetic
-------

Bigfoot assets are loaded via Assetic and are gitignored. To have the admin interface display properly in the production environment, you first must dump the assets with :

    ./app/console assetic:dump --env=prod
