<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DB;
use App\PlanesNew;
use App\Countries;

class ImportPlanes extends Command
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

                $type = $this->cleanType($lines[1]);

                // ignore rows with blank type and conNumber
                if ($type && $lines[2]) {
                    $sql = "INSERT INTO `aircraft`.`planesNew` ( `reg`, `type`, `conNumber`, `notes` , `countryCode`) VALUES ( '$lines[0]', '$type', '$lines[2]', '$notes' , '$code') ;";
                    DB::insert($sql);
                    $counter++;
                }
            }
        }
        $this->question("FINISHED " . time() . " completed " . $counter . " lines");
    }

    /** correct typos in the original data and standardize types
     * see this link for the 4 letter codes
     * http://www.flugzeuginfo.net/table_accodes_en.php?sort=manuasc
     *
     * @return string
     */
    protected function cleanType($type)
    {
        if ($type == "A318 Elite") {
            return "Airbus A318 Elite";
        } elseif ($type == "Dasasult Falcon 2000") {
            return "Dassault Falcon 2000";
        } elseif ($type == "Cessna F550 Citation II") {
            return "Cessna 550 Citation II";
        } elseif ($type == "Eclipse 500") {
            return "Eclipse EA500";
        } elseif ($type == "125-700A") {
            return "BAe 125-700A";
        } elseif ($type == "BAe125-700A") {
            return "BAe 125-700A";
        } elseif ($type == "BAe125-800A") {
            return "BAe 125-800A";
        } elseif ($type == "BAe125-800SP") {
            return "BAe 125-800SP";
        } elseif ($type == "Cessna 525A Citation Cj2") {
            return "Cessna 525A CitationJet Cj2";
        } elseif ($type == "Falcon 20") {
            return "Dassault Falcon 20";
        } elseif ($type == "Falcon 2000") {
            return "Dassault Falcon 2000";
        } elseif ($type == "FALCON 20C") {
            return "Dassault Falcon 20C";
        } elseif ($type == "Falcon 20D") {
            return "Dassault Falcon 20D";
        } elseif ($type == "Falcon 20E") {
            return "Dassault Falcon 20E";
        } elseif ($type == "Falcon 20F") {
            return "Dassault Falcon 20F";
        } elseif ($type == "Gulfstream 2SP") {
            return "Gulfstream IISP";
        } elseif ($type == "Gulfstream 450") {
            return "Gulfstream G450";
        } elseif ($type == "Lear Jet 24") {
            return "Learjet 24";
        } elseif ($type == "Lear Jet 24D") {
            return "Learjet 24D";
        } elseif ($type == "Lear Jet 25B") {
            return "Learjet 25B";
        } elseif ($type == "Lear Jet 25C") {
            return "Learjet 25C";
        } elseif ($type == "Lear Jet 25D") {
            return "Learjet 25D";
        } elseif ($type == "Lear Jet 25G") {
            return "Learjet 25G";
        } else {
            return $type;
        }
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
