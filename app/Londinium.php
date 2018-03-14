<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Londinium extends Model
{
    protected $connection = 'mysql3';
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    
    protected $table = 'sites';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = true;

    /**
     * Indicates what can be updated or edited
     *
     * @var bool
     */
    protected $fillable = [
        'saved', 'subcategory_id'
    ];

    // join cat/subcat

    public function subcategory()
    {
        return $this->belongsTo(Subcategories::class, 'subcategory_id', 'id');
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
