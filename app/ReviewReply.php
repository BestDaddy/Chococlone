<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewReply extends Model
{
    //

    protected $fillable = [
        'review_id', 'user_id', 'comment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    public function review(){
        return $this->belongsTo('App\Review');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
