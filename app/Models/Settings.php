<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;
    protected $table = 'settings';
    public $fillable = ['id', 'ceo_name', 'app_name', 'agent_commission', 'referral_code'];
}
