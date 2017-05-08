<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use DB;
use App\Planes;
use App\PlanesNew;
use App\Countries;

class ImportNewAircraftToLive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bizjets:importNewAircraftToLive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Compares the newly downloaded aircraft to the live table';

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

        // first loop - get the results from planesNew

        PlanesNew::orderBy('id')->chunk(100, function ($planesNew) {
             foreach ($planesNew as $row) {

                $planes = Planes::select('reg', 'type', 'conNumber')->where('reg', '=', $row->reg )->where('type', '=', $row->type )->where('conNumber', '=', $row->conNumber )->first();

                if (!$planes){
                    echo "NEW " . $row->reg . " " . $row->type ." " . $row->conNumber . PHP_EOL;
                    
                    $plane = new Planes;
                    $plane->reg = $row->reg;
                    $plane->type = $row->type;
                    $plane->conNumber = $row->conNumber;
                    $plane->notes = $row->notes;
                    $plane->countryCode = $row->countryCode;
                    $plane->save();

                }
            }
        });
    }
}
