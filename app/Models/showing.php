<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class showing extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater', 'show_time'
    ];
}
