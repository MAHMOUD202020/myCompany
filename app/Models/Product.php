<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $guarded = [];


    public function category(){
        return $this->belongsTo(Category::class);
    }


    ///////////////////////////////////////////////////////
    ////                                               ////
    //// ..........  Methods Clean Code .............. ////
    ////                                               ////
    ///////////////////////////////////////////////////////


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id',  'name_ar', 'name_en', "name_$lang as name", "shortDescription_$lang as shortDescription", 'is_home', 'img', 'gallery', 'sort', "category_id", 'deleted_at');
    }

    public function scopeSort($q){
        return $q->orderBy('sort', 'asc')->orderBy('id', 'desc');
    }
}
