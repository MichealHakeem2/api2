<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $table="Courses";
    protected $fillable =['name','link','image'];
}
