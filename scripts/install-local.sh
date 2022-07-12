cp ./app/.env.example ./app/.env && \
docker-compose -f docker-compose-local.yml up -d && \
docker exec -t feellucky_local_app composer install && \
docker exec -t feellucky_local_app php artisan key:generate && \
docker exec -t feellucky_local_app chown 1000:1000 -R /var/www/ && \
docker exec -t feellucky_local_app chown 1000:www-data -R /var/www/storage && \
docker exec -t feellucky_local_app chmod 775 -R /var/www/storage
