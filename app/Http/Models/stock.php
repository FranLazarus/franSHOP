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

    //一對一。函數名要對應Model名才管用
    public function product(){
        return $this->belongsTo(product::class);
    }
    // stock::find('sSeI6QexxL31')->product
    // stock::find('sSeI6QexxL31')->product()->get();

    public function size(){
        return $this->belongsTo(size::class);
    }

    public function pattern(){
        return $this->belongsTo(pattern::class);
    }
}
