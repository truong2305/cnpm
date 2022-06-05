<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title', 'content', 'date', 'month', 'year', 'imgs'
    ];
}
