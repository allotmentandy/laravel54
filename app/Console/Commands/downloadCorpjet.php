<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;

class downloadCorpjet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bizjets:download';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download the html from the corpjet website';

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
        $files = file('/var/www/laravel54/corpjet.txt', FILE_IGNORE_NEW_LINES);
        foreach ($files as $file) {
            // echo $file . PHP_EOL;

            $client = new Client([
        // You can set any number of default request options.
        'timeout'  => 200.0,
        ]);
            $response = $client->request('GET', $file);
            $html = $response->getBody()->getContents();

            // remove http://www.laasdata.com/corpjet/
            $file = substr($file, 32);

            if (file_put_contents('/var/www/laravel54/bizjets/'.$file, $html)) {
                echo $file.' DOWNLOADED';
            } else {
                echo 'failed';
            }

            echo PHP_EOL;

            sleep(10);
        }
    }
}
