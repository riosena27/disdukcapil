<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AktaKelahiran extends Model
{
    protected $table = 'akta_kelahiran';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
