<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function heads(){
        return $this->hasOne(Head::class,"id","head_id");
    }
    
    public function products(){
        return $this->hasMany(Product::class,"department_id","id");
    }
    
}
