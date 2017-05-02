# Andys laravel 5.4 notes

## Introduction

This is a demo application to show off some of the features of Laravel 5.4 that i have made.

## Install

download the app 

create 2 directories 

```
/bizjets
/rss
```

run
``` 
composer install
```

import 3 databases

```
mysql -u root -p aircraft < aircraft.sql
mysql -u root -p laravel54 < laravel54.sql
mysql -u root -p londinium < londinium.sql

```

### Private Jet database tools

set a variable for the directory where the corpjet files will be downloaded in the .env file

``` 
BIZJETS_DIRECTORY = /var/www/laravel54/bizjets/
```

download data from the corpjet website using this command to the diretory above. The file corpjet.txt contains the urls for the country lists

```
php artisan bizjets:download
```

Parse the files using xpath and import into the database from each of these files into the planesNew table

```
php artisan bizjets:import
```

to do 

``` compare the new data to the planesLatest table ```


### to do
- private jet database examples
- guzzle command to download html
- import command to parse downloaded html
- twitter api examples 

#### phpunit tests
run with 

```
./vendor/bin/phpunit
```


### Dusk tests
run with 

```
php artisan dusk
```



