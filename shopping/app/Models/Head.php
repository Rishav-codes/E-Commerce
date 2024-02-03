<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Head extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function departments(){
        return $this->hasMany(Department::class,"head_id","id");
    }
}
