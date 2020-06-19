<?php

namespace App\Jobs;

use App\Planes;
use Artisan;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class downloadSeenAircraftImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $id;
    protected $reg;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;

        $result = Planes::where('id', $id)->first();
        $this->reg = $result->reg;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $id = $this->id;
        echo 'job arrived -> '.$this->reg.PHP_EOL;

        Artisan::queue('bizjets:downloadImageAirlinersNet', ['reg' => $this->reg]);
        Artisan::queue('bizjets:downloadImageJetPhoto', ['reg' => $this->reg]);
    }
}
