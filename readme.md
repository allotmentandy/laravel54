# Allotmentandy's Laravel 5.4 demo

## Introduction

This is a demo application to show off some of the features of Laravel 5.4 that i have made. It has the following features

- Private Jet system for importing data using commands 
- londinium website directory system
- jquery examples
- rss feeds to download laravel jobs from 3 feeds
- guzzle command to download html
- import command to parse downloaded html
- twitter api examples 

## Install

download the app 
```
mkdir /var/www/laravel54
cd /var/laravel54
git clone https://github.com/allotmentandy/laravel54
```

create 4 directories and give them read/write rights

```
mkdir bizjets
mkdir rss
mkdir public/jetPhotos
mkdir public/airlinersNet 
```

PHP requirements
```
apt-get install php7.0-gd
apt-get install php7.0-tidy
apt-get install php7.0-mbstring
```

run
``` 
php artisan key:generate
php artisan config:clear
composer install
```

import 3 databases

```
mysql -u root -p aircraft < aircraft.sql
mysql -u root -p laravel54 < laravel54.sql
mysql -u root -p londinium < londinium.sql

```
create .env file from the .env.example
```
setup the database username and password for the 3 databases
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

### Job to download an image when a plane is marked as seen

```
php artisan queue:work --tries=1
```

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





### to do
- compare the planesNew data to the planes table 
- Xpath extract the data from the donwload jobs - serial, owner and store in db 
- blank results for registration eg. 3c-llx
