<?php
namespace App;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Socializer extends Authenticatable
{
    
    use Notifiable;
    protected $guard = 'socializer';
    //use AuthenticableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'uid', 'password','email'
    ];
  
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
