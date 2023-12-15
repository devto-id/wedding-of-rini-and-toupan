<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileBrides extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name_groom',
        'last_name_groom',
        'first_name_bride',
        'last_name_bride',
        'son_of',
        'daughter_of',
        'ig_groom',
        'ig_bride',
        'photo_groom',
        'photo_bride',
    ];
}
