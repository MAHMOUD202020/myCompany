<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory , SoftDeletes;

    protected $guarded = ['_token'];

    protected $appends = ['src'];



    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }


    public function productsNotSave(){

        return $this->belongsToMany(Product::class , 'product_category')
            ->whereDoesntHave('students' , function ($q){
                return $q->where( 'student_id' , '=' , auth('student')->id());
            });
    }


       ///////////////////////////////////////////////////////
      ////                                               ////
     //// ............. Custom Methods ................ ////
    ////                                               ////
   ///////////////////////////////////////////////////////

    public function getSrcAttribute(){

        return asset('assets/admin/images/categories');
    }

    public function scopeParentCategories($q){

        return $q->where('parent_id' , '=' , 0);
    }

    public function scopeCategories($q){

        return $q->where('parent_id' , '!=',  0);
    }


    public function scopeCustomSelect($q){

        $lang = app()->getLocale();

        return $q->select('id', 'sort', "name_$lang as name", 'icon' , 'parent_id', 'url');
    }

    public function scopeSort($q){

        return $q->orderBy('sort', 'desc');
    }

}
