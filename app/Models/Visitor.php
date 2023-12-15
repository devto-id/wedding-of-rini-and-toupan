<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', // Tambahkan 'id' ke dalam fillable
        'name',
        // Tambahkan atribut lain yang perlu diisi melalui mass assignment
    ];
}
