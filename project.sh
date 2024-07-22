if [ -z "$#" ]
then
      echo "NO ARGUMENTS"
else
    if [ $1 = "up" ]; then
        docker-compose up -d --build
    elif [ $1 = "down" ]; then
        docker-compose down
    elif [ $1 = "status" ]; then
        docker container ls
    elif [ $1 = "test" ]; then
       docker-compose exec -e DB_HOST=mysql_test php php artisan test $2 $3 $4
    elif [ $1 = "watch" ]; then
       docker-compose run --rm npm run watch
    elif [ $1 = "artisan" ]; then
        docker-compose exec php php artisan $2 $3 $4
    elif [ $1 = "install" ]; then
        docker-compose run --rm npm i
        docker-compose run --rm npm run dev
        docker-compose exec php composer i
        docker-compose exec php php artisan config:clear
        docker-compose exec php php artisan view:clear
        docker-compose exec php php artisan route:clear
        docker-compose exec php php artisan orchid:install
        docker-compose exec php php artisan orchid:admin
    elif [ $1 = "update" ]; then
        docker-compose run --rm npm i
        docker-compose run --rm npm run dev
        docker-compose exec php composer i
        docker-compose exec php php artisan migrate
        docker-compose exec php php artisan config:clear
        docker-compose exec php php artisan view:clear
        docker-compose exec php php artisan route:clear
    else
        docker-compose run --rm $1 $2 $3 $4
    fi
fi
