FROM nginx

MAINTAINER suhindra <suhindrasuhindra@gmail.com>

RUN rm -f /etc/nginx/nginx.conf

ADD nginx.conf /etc/nginx/nginx.conf

RUN service nginx restart

EXPOSE 80
