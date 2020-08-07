<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AircraftData extends Model
{

	protected $connection = 'mysql2';
	
 /**
     * The table associated with the model.
     *
     * @var string
     */
    
    protected $table = 'aircraftData';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;

    /**
     * Indicates what can be updated or edited
     *
     * @var bool
     */

}
