#!/bin/bash

echo "This a bash script to run composer clear the caches)"
echo "--------------"
#php -v
#echo "--------------"

cd /var/www/laravel54

php artisan down
#echo "--------------Composer normally do install, update once a week"

composer dump-autoload -o

#echo "--------------Artisan"
php artisan view:clear
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan clear-compiled
php artisan config:cache


php artisan up

# echo "--------------colors example in bash"


# for (( i = 0; i <= 7; i++ )); 
# do echo "$(tput setaf $i)Red text $(tput setab $i)and white background$(tput sgr 0)"
# # echo -e "\e[0;"$i"m  Hi stackoverflow" $i; 
# done

# echo "$(tput setaf 1)Red text $(tput setab 7)and white background$(tput sgr 0)"

# for (( i = 30; i <= 37; i++ )); 
# do echo -e "\e[0;"$i"m  Hi stackoverflow" $i; 
# done



