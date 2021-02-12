<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiftCard extends Model
{
    protected $guarded = [];

    public function cardItems()
    {
        return $this->hasMany(GcardItem::class,'card_id');
    }
}
