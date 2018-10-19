<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Planes;
use App\PlanesNew;
use App\Countries;

class ImportDeletedAircraftToLive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bizjets:importDeletedAircraftToLive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'process the planesNew table and find those missing from planes';

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

        // first loop - get the results from planes (the original list)

        Planes::orderBy('id')->chunk(100, function ($planes) {
            foreach ($planes as $row) {
                $planesNew = PlanesNew::select('type', 'conNumber')->where('type', '=', $row->type)->where('conNumber', '=', $row->conNumber)->first();

                if (isset($planesNew)) {

                } else {

                             echo "DELETED ".  $row->reg . " ". $row->type ." " . $row->conNumber .PHP_EOL;
                        
                    } 
                }
            
        });

    }
}
