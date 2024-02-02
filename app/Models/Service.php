<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', "name_$lang as name", 'name_ar', 'name_en', "shortDescription_$lang as shortDescription", 'cover', 'img', 'sort', 'deleted_at');
    }

    public function scopeSort($q){
        return $q->orderBy('sort', 'asc')->latest();
    }
}
