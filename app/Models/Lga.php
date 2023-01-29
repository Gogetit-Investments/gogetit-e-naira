<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;
    protected $table = 'lga';
    public $fillable = ['lga_code', 'lga_name', 'state_code'];


}
