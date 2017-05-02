<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlanesLatest extends Model
{

	protected $connection = 'mysql2';
	
 /**
     * The table associated with the model.
     *
     * @var string
     */
    
    protected $table = 'planesLatest';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;
}
