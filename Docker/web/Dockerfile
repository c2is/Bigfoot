FROM debian:wheezy

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update -y
RUN apt-get install -y acl nginx php5-fpm php5-mysqlnd php5-cli php5-intl php5-curl curl git supervisor

RUN sed -e 's/;daemonize = yes/daemonize = no/' -i /etc/php5/fpm/php-fpm.conf
RUN sed -e 's/;listen\.owner/listen.owner/' -i /etc/php5/fpm/pool.d/www.conf
RUN sed -e 's/;listen\.group/listen.group/' -i /etc/php5/fpm/pool.d/www.conf
RUN echo "\ndaemon off;" >> /etc/nginx/nginx.conf

RUN echo 'shell /bin/bash' > ~/.screenrc

RUN curl -sS https://getcomposer.org/installer | php

ADD vhost.conf /etc/nginx/sites-available/default
ADD supervisor.conf /etc/supervisor/conf.d/supervisor.conf
ADD init.sh /init.sh
ADD buildapp.sh /buildapp.sh

EXPOSE 80

VOLUME ["/srv"]
WORKDIR /srv

CMD ["/usr/bin/supervisord"]