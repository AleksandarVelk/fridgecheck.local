<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_dishes extends Model
{
	protected $table = 'type_dishes';

    public function recipes()
    {
    	return $this->belongsTo('App\Models\Recipes');

    }
}
