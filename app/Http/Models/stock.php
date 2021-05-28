<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
        'timestamp',
    ];
}
