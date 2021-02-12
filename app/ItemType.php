<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $guarded = [];

    public function item()
    {
        return $this->belongsTo(Items::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class,'item_type_id');
    }

    protected $casts = [
        'additional' => 'object'
    ];

}
