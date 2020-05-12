<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    //
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'discount', 'bought', 'company_id'
    ];

    public function company(){
        return $this->belongsTo('App\Company');
    }
}
