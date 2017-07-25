<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class rss extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download the rss feeds';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
            
    $files = file("/var/www/laravel54/rss/feeds.txt", FILE_IGNORE_NEW_LINES);
    foreach ($files as $file) {
        // echo $file . PHP_EOL;
    
        $client = new Client([
        // You can set any number of default request options.
        'timeout'  => 200.0,
        ]);
        $response = $client->request('GET', $file);
        $html = $response->getBody()->getContents();

        $file = $name = str_replace(array('-','/'), "-", $file);

        if (file_put_contents('/var/www/laravel54/rss/' . $file.".rss", $html)) {
            echo $file . ' DOWNLOADED';
        } else {
            echo 'failed';
        }

        echo PHP_EOL;

        sleep(4);
    }
    }
}
