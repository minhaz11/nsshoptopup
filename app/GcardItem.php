<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GcardItem extends Model
{
    protected $guarded = [];

    public function card()
    {
        return $this->belongsTo(GiftCard::class,'card_id');
    }

    public function codeItems()
    {
        return $this->hasMany(CodeItem::class,'card_item_id');
    }
}
