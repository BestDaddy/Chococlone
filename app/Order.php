<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'certificate_id', 'user_id', 'count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function certificate(){
        return $this->belongsTo('App\Certificate');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
}
