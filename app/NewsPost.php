<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class NewsPost extends Model
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
        'body'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();        
    }
}
