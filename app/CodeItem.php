<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeItem extends Model
{
    protected $guarded = [];

    public function cardItem()
    {
        return $this->belongsTo(CodeItem::class,'card_item_id');
    }
}
