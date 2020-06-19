<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $connection = 'mysql2';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
