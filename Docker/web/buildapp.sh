#!/bin/bash

app/console -n doctrine:database:create;
app/console -n doctrine:schema:update --force;
app/console -n doctrine:fixtures:load;
app/console -n bigfoot:theme:install --symlink;
app/console -n assetic:dump --env=admin;
setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache/
setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache/
setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/logs/
setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/logs/