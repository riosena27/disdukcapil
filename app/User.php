<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nik', 'nik_kk', 'name','jenis_kelamin','tempat_lahir','tanggal_lahir','no_hp', 'email', 'password', 'kode_verifikasi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasAnyRoles($roles)
    {

        if ($this->roles()->whereIn('name', $roles)->first()) {
            return true;
        }

        return false;
    }

    public function hasRole($role)
    {

        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }

        return false;
    }

    public function aktakelahiran(){
        return $this->hasMany('App\AktaKelahiran', 'user_id');
    }

    public function reviewOperator(){
        return $this->hasMany('App\AktaKelahiran', 'operator_id');
    }

    public function reviewKasie(){
        return $this->hasMany('App\AktaKelahiran', 'kasie_id');
    }

    public function reviewKabid(){
        return $this->hasMany('App\AktaKelahiran', 'kabid_id');
    }

    public function reviewKadis(){
        return $this->hasMany('App\AktaKelahiran', 'kadis_id');
    }

}
