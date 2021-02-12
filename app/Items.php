<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $guarded = [];

    protected $casts = [
        'additional' => 'object'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function itemTypes()
    {
        return $this->hasMany(ItemType::class);
    }
}
