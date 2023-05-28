#!/bin/bash

docker-compose up -d && \
docker-compose exec --user=sail apache composer update && \
docker-compose exec --user=sail apache npm i && \
docker-compose exec --user=sail apache npm run build
echo "Everything should be okay, add 0.0.0.0 local.test to your /eth/hosts and try visit it!"
