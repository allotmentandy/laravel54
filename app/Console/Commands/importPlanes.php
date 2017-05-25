<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DB;
use App\PlanesNew;
use App\Countries;

class importPlanes extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'bizjets:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bizjets Importer for country files';

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
        $this->comment("STARTING " . time());

        $counter = 0;

        //path to directory to scan
        $directory = env("BIZJETS_DIRECTORY") . "*.php";
        echo $directory . PHP_EOL;

        if (env("BIZJETS_DIRECTORY") == "") {
            echo "you need to run php artisan config:clear" . PHP_EOL;
            exit;
        }

        echo "Importing files into database". PHP_EOL;


        $run = $this->ask('Do you want to run this import and CLEAR THE planesNew table? Type YES');

        if ($run != "YES") {
            echo "You need to type YES to run it, ABORTING";
            exit;
        }

        PlanesNew::truncate();

        $files= glob($directory);

        usort($files, function ($a, $b) {
            return filemtime($a) - filemtime($b);
        });


        $filesArray =  array();

        //print each file name
        foreach ($files as $file) {
            // echo $file . PHP_EOL;
            $filesArray[] = $file;
        }


        foreach ($filesArray as $file) {
            $doc = new \DOMDocument();
            $myfile = fopen($file, "r") or die("Unable to open file!");
            $fileContents = fread($myfile, filesize($file));
            $tidy = tidy_parse_string($fileContents);
            $html = $tidy->html();
            $doc->loadHTML(mb_convert_encoding($html, "UTF-8"));
            $xpath = new \DOMXpath($doc);

            // get counrty code from the filename
            $bits = explode("-icao-", $file);
            $code = strtoupper(substr($bits[1], 0, -4));
            echo  $code . " " . $file . PHP_EOL;

            // collect header names
            $headerNames = array();
            foreach ($xpath->query('//table[@class="tablesorter"]//th') as $node) {
                $headerNames[] = $node->nodeValue;
            }

            // collect data
            foreach ($xpath->query('//tbody/tr') as $node) {
                $lines = array();

                foreach ($xpath->query('td', $node) as $cell) {
                    $lines[] = $cell->nodeValue;
                }

                $notes = strtoupper($lines[3]);
                $aReplace = array('(', ')');
                $notes = str_replace($aReplace, ' ', $notes);

                $aReplace = array(' EX ', ',' , '/', '  ');
                $notes = str_replace($aReplace, ' ', $notes);

                // ignore rows with blank type and conNumber
                if ($lines[1] && $lines[2]) {
                    $sql = "INSERT INTO `aircraft`.`planesNew` ( `reg`, `type`, `conNumber`, `notes` , `countryCode`) VALUES ( '$lines[0]', '$lines[1]', '$lines[2]', '$notes' , '$code') ;";
                    DB::insert($sql);
                    $counter++;
                }
            }
        }
        $this->question("FINISHED " . time() . " completed " . $counter . " lines");

//end of command
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('example', InputArgument::OPTIONAL, 'An example argument.'),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
        );
    }
}
