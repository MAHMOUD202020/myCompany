<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = [];



    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', "title_$lang as title", "value", 'icon' , 'deleted_at');
    }

    public function scopeSort($q){
        return $q->orderBy('type', 'asc')->orderBy('id', 'desc')->latest();
    }


}
