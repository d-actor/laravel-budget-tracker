<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    // public static function boot()
    // {
    //     parent::boot();
    //     self::created(function($model) {
    //     });
    // }

    protected $fillable = ['modifier', 'amount', 'description', 'account_id'];
    
}
