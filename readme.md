# Allotmentandy's Laravel 5.4 demo

I am looking for a job either in London, or working remotely. I have around 20 years experience working for a wide range of firms using a lot of different technologies. If you think i might be a good fit for your firm, please contact me by posting an issue on this repository or contacting me on twitter.com/londiniumcom

![Homepage screenshot](/tests/Browser/screenshots/home.png)

## Introduction

This is a demo application to show off some of the features of Laravel 5.4 that i have made. It has the following features

- Private Jet system for importing data using artisan commands 
- API version of the planes database 
- website directory system manager to output static html site
- jquery examples
- vue.js examples
- rss feeds to download laravel jobs and news from feeds
- guzzle artisan command to download html
- import artisan command to parse downloaded html
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
mkdir public/planeImages
mkdir public/planeImages/jetPhotos
mkdir public/planeImages/airlinersNet
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

![Planes DB screenshot](/tests/Browser/screenshots/planesList.png)


set a variable for the directory where the corpjet files will be downloaded in the .env file

``` 
BIZJETS_DIRECTORY = /var/www/laravel54/bizjets/
```

### Commands and Queued Jobs

![Planes DB screenshot](/tests/Browser/screenshots/artisan.png)


download data from the corpjet website using this command to the directory above. The file corpjet.txt contains the urls for the country lists


```
php artisan bizjets:download
```

![Planes DB screenshot](/tests/Browser/screenshots/downloader.png)


Parse the files using xpath and import into the planesNew table from each of these files 

```
php artisan bizjets:import
```

Compate the planesNew table with the planes table

```
php artisan bizjets:importNewAircraftToLive 

* version 1 - only imports new aircraft so far!
```


### Job to download an image when a plane is marked as seen

```
php artisan queue:work --tries=1
```

![Planes DB screenshot](/tests/Browser/screenshots/queue.png)


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
- Xpath extract the data from the download jobs - serial, owner and store in db 
- blank results for registration eg. 3c-llx
