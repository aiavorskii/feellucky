#!/bin/bash
docker exec -t -u 1000:1000 feellucky_local_app php artisan $@
