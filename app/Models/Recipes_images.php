<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipes_images extends Model
{
    protected $table = 'recipes_images';

    public function recipes()
    {
    	return $this->belongsTo('App\Models\Recipes');

    }
}
