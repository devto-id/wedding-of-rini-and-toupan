<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'addres', 'presensi', 'message'];

    public static function createFeedback($name, $addres, $presensi, $message)
    {
        return static::create([
            'name' => $name,
            'addres' => $addres,
            'presensi' => $presensi,
            'message' => $message,
        ]);
    }
}
