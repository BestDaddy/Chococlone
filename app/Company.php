<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Company extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
//        'build_from' => 'id',
//        'save_to' => 'slug',
        'on_update' =>true,
    ];
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
    public function reviews(){
        return $this->hasMany('App\Review');
    }

}   
