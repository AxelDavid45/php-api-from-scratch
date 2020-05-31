FROM nginx

RUN rm /etc/nginx/conf.d/default.conf

COPY ["conf.d/site.conf", "/etc/nginx/conf.d"]

RUN mkdir /var/www
RUN mkdir /var/www/public

EXPOSE 80
