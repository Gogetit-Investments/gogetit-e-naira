<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;



class Consumer extends Model
{
    use HasFactory;
    protected $table = 'consumer_data';
    public $fillable = ['registration_number', 'first_name', 'last_name', 'other_names', 'added_by', 'phone_number', 'postal_code', 'contact_address', 'city', 'lga', 'state', 'country', 'dob', 'country_of_birth', 'state_of_birth', 'referral_code', 'state_code', 'title_code', 'commission'];
    // protected $casts = ['dob' => 'datetime:d/m/Y'];
    // protected $dateFormat = 'd/m/Y';

    protected $dates = [
        'dob',
    ];

    public function getCreatedFormatAttribute()
    {  
        return $this->dob->format('d/m/Y');
    }
  protected $appends = ['dob'];

/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function state_of_residence(): HasOne
{
    return $this->hasOne(State::class, 'state_code', 'state_code');
}

/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function state_of_origin(): HasOne
{
    return $this->hasOne(State::class, 'state_code', 'state_of_birth');
}


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function tier_info(): HasOne
{
    return $this->hasOne(Tier::class, 'code', 'tier_id');
}


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function lga_info(): HasOne
{
    return $this->hasOne(Lga::class, 'lga_code', 'lga');
}


/**
 * Get the user associated with the Consumer
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasOne
 */
public function country_info(): HasOne
{
    return $this->hasOne(Country::class, 'country_code', 'country');
}

public function country_of_origin(): HasOne
{
    return $this->hasOne(Country::class, 'country_code', 'country_of_birth');
}

}

