<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable = [
        'company_id', 'user_id', 'comment', 'rating'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function company(){
        return $this->belongsTo('App\Company');
    }


    public function user(){
        return $this->belongsTo('App\User');
    }
}
