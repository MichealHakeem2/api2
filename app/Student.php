<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table="Student";
    protected $fillable =['name','email','phone','collage','password','image'];
}

