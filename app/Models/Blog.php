<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable =['user_id','category_id','title','url','image','image_alt','meta','short_description','description','active'];


public function user(){
    return $this->belongsTo(user::class);
 }


 public function Category(){
    return $this->belongsTo(Category::class);
 }

 public function Tags(){
    return $this->belongsToMany(Tag::class);
 }

}
