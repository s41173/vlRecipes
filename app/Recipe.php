<?php
namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Recipe extends Moloquent {

    protected $fillable = [
        'name', 'img', 'ingredients', 'steps'
    ];
}