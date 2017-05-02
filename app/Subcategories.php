<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{

	protected $connection = 'mysql3';
	
    /**
     * The table associated with the model.
     *
     * @var string
     */
    
    protected $table = 'subcategories';
    
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
    protected $fillable = [
        'saved'
    ];     




}
