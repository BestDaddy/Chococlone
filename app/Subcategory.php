<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'category_id', 'description'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function companies(){
        return $this->hasMany('App\Company');
    }
}
