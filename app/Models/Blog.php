<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function categories(){
        return $this->belongsToMany(Category::class, 'blogs_categories');
    }

    public function scopeSort($q){
        return $q->orderBy('id', 'desc');
    }

    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', "name_$lang as name", "shortDescription_$lang as shortDescription", 'cover', 'img', 'deleted_at');
    }
}
