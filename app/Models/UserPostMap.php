<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPostMap extends Model
{
    use HasFactory;
    protected $table ='user_post_map';
    protected $fillable = [
        'user_id',
        'post_id',
    ];
}
