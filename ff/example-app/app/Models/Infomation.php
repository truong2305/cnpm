<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infomation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'address', 'phone', 'phone2', 'email', 'zalo', 'link_mess',
        'link_fb', 'phone_c', 'phone_h', 'phone_n', 'fb', 'link_ig',
        'ig_h', 'ig_n', 'ig_c', 'fb_h', 'fb_n', 'fb_c', 'name'
    ];

}
