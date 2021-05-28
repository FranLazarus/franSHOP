<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $guarded = [
        'id',
        'created_at',
    ];
    protected $hidden = [
        'created_at',
    ];
}
