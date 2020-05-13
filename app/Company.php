<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'address', 'phone', 'subcategory_id', 'discount'
    ];

    public function subcategory(){
        return $this->belongsTo('App\Subcategory');
    }
    public function certificats(){
        return $this->hasMany('App\Certificate');
    }

}   
