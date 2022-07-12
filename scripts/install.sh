
docker-compose -f docker-compose.yml up -d && \
docker exec -t feellucky_app composer install && \
docker exec -t feellucky_app chown 1000:1000 -R /var/www/ && \
docker exec -t feellucky_app chown 1000:www-data -R /var/www/storage && \
docker exec -t feellucky_app chmod 775 -R /var/www/storage