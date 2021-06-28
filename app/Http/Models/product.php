<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $incrementing = false;

    protected $guarded = [
        'id',
        'created_at',
    ];
    protected $hidden = [
        'created_at',
    ];
    
    //自製屬性
    protected $appends = ['price_diff'];
    protected function getPriceDiffAttribute(){
        return (($this->price) - ($this->sale_price));
    }

    //一對多
    public function stock(){
        return $this->hasMany(stock::class);
    }
    //product::find('sSeI6QexxL')->stock
}
