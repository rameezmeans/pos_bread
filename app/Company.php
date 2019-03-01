<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['company', 'email', 'phone','address','city','state', 'country', 'user_id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function user(){

        return $this->belongsTo('App\User');

    }


}
