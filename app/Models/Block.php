<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $guarded = [];

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ...............  relationship ............... ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function items () {

        return $this->hasMany(Item::class)->customSelect();
    }

    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', 'page', 'name', "title_$lang as title", "text_$lang as text", 'img', 'is_container', 'is_active');
    }

    public function scopeActive($q)
    {
        return $q->where('is_active' , 1);
    }
    }
