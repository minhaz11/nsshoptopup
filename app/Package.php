<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = [];

    public function itemType()
    {
        return  $this->belongsTo(ItemType::class,'item_type_id');
    }
}
