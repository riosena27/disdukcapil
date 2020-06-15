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

    public function operator(){
        return $this->belongsTo('App\User', 'operator_id');
    }

    public function kasie(){
        return $this->belongsTo('App\User', 'kasie_id');
    }

    public function kabid(){
        return $this->belongsTo('App\User', 'kabid_id');
    }

    public function kadis(){
        return $this->belongsTo('App\User', 'kadis_id');
    }
}
