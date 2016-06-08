<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipes extends Model
{
	static $demands = [
        'very easy' => 'very easy',
        'easy' => 'easy',
        'moderate' => 'moderate',
        'demanding' => 'demanding'
    ];

    public static function getDemands()
    {
        return self::$demands;
    }


    public function images()
    {
    	return $this->hasMany('App\Models\Recipes_images', 'recimg_id');

    }

    public function dishes()
    {
    	return $this->hasMany('App\Models\Type_dishes', 'typedishes_id');

    }

}
