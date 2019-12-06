<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function account()
    {
        return $this->belongsTo('App\Account');
    }

    protected $fillable = ['modifier', 'amount', 'description', 'account_id'];
}
