<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Admin as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Admin extends Model
{
    use HasApiTokens ,Notifiable;
    protected $table="Admin";
    protected $fillable =['name','phone','email','password','image','role'];
}
