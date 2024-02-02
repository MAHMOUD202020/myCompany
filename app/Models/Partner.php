<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeSort($q){
        return $q->orderBy('sort', 'asc')->latest();
    }

    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', 'sort', "name_$lang as name", "url", 'icon');
    }

}
