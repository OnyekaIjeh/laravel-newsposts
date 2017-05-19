<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Sluggable;

    /**
    *Return the sluggable configuration aray for this model.
    *
    * @return array
    */

    public function sluggable(){
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    /**
    * Fillable fields
    * @var array
    */
    protected $fillable = [
        'title',
        'slug',
        'body',
        'image'
    ];
}
