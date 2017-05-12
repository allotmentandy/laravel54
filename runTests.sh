#!/bin/bash

echo "This a bash script to run tests (then set the chmod as i am editing as andy)"
echo "--------------"

cd /var/www/laravel54

echo "--------------running phpunit tests"
phpunit


echo "--------------running codeception tests"
./vendor/bin/codecept run


echo "--------------running dusk tests"
php artisan dusk



# echo "--------------colors example in bash"


# for (( i = 0; i <= 7; i++ )); 
# do echo "$(tput setaf $i)Red text $(tput setab $i)and white background$(tput sgr 0)"
# # echo -e "\e[0;"$i"m  Hi stackoverflow" $i; 
# done

# echo "$(tput setaf 1)Red text $(tput setab 7)and white background$(tput sgr 0)"

# for (( i = 30; i <= 37; i++ )); 
# do echo -e "\e[0;"$i"m  Hi stackoverflow" $i; 
# done



