<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumer extends Model
{
    use HasFactory;
    protected $table = 'consumer_data';
    public $fillable = ['registration_number','tier_id', 'bvn', 'nin', 'first_name', 'last_name', 'other_names', 'added_by'];
}
