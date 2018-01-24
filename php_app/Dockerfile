FROM tutum/apache-php

MAINTAINER Suhindra <suhindrasuhindra@gmail.com>

RUN apt-get update && apt-get install -yq git && rm -rf /var/lib/apt/lists/*

RUN rm -fr /app

ADD . /app