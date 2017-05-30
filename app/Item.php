<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
	    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';
    

    public $fillable = ['title','description'];

}
