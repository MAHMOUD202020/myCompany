<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;


    protected $guarded = [];



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', "title_$lang as title", "text_$lang as text", "btn_text_$lang as btn_text",'url', 'img', 'background', 'sort');
    }

    public function scopeSort($q){

        return $q->orderBy('sort', 'asc')->latest();
    }

}
