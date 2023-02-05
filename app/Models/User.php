<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use  HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'other_names',
        'username',
        'email',
        'password',
        'role_id',
        'phone_number',
        'added_by',
        'coordinator_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
{
   $this->attributes['password'] = bcrypt($value);
}

/**
 * Get the role associated with the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function role_info(): HasOne
{
    return $this->hasOne(Role::class, 'id', 'role_id');
}

}
