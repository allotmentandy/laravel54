<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spider extends Model
{
    protected $connection = 'mysql3';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    
    protected $table = 'spider';
    
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
        'id' ,
        'title' ,
        'status',
        'updated_at'
    ];

    // join cat/subcat
}
