<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\String\b;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ...............  relationship ............... ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function block () {

        return $this->belongsTo(Block::class);
    }

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', 'sort', "title_$lang as title", "text_$lang as text", 'img', 'url', 'block_id');
    }

    public function scopeSort($q){

        return $q->orderBy('sort', 'asc');
    }
}
