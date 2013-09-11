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

The Bigfoot administration interface is accessed in its specific environment named admin. It means the entry point is the admin.php file (or admin_dev.php for the debug mode), and the configuration is handled in the _admin suffixed files.
The configuration setup looks like :

- app
    - config
        - common.yml : contains configuration options used by both the front and back offices
        - config.yml : contains configuration options for the front office
        - config_admin.yml : contains configuration options for the back office
        - routing.yml : contains routing configuration for both the front office and back office
        - routing_admin.yml : contains routing configuration for the front office

Default configuration only includes the administration interface routes in the admin environment.
The administration interface is then available at :

    http://localhost/admin(_dev).php/admin/

Bigfoot comes with the SEO and User plugins.
By default, an authentication is required to access (if you loaded the bundled fixtures, you can use the admin / admin account).
Feel free to change the authentication configuration in app/Resources/config/security.yml to fit your needs, though be advised that the BigfootUserBundle features won't be usable if your User class doesn't extend the Bigfoot\Bundle\UserBundle\Model\BigfootUser class.

You should create a new admin user and delete the one loaded with the BigfootUserBundle fixtures if your application is accessible from the outside.

You can comment the content of the app/Resources/config/security.yml file to disable the authentication on the application.


Assetic
-------

Bigfoot assets are loaded via Assetic and are gitignored. To have the admin interface display properly in the production environment, you first must dump the assets with :

    ./app/console assetic:dump --env=prod
    
Documentation
-------

[Read the dedicated Github pages website](http://c2is.github.io/BigfootDoc/html/en/).
