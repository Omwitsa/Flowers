<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class varietyRange extends Model
{
    use HasFactory;

    protected $fillable = [
        'Name',
        'HeadSize',
        'Brand',
        'active',
    ];
}
