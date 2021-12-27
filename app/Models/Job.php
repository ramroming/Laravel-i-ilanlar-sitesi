<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    #one to many / Get the category of the job / Belongs to
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

//    many to one, each job is published by one and only one user

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //one to many, each job is related to one or more application
    public function application(){
        return $this->hasMany(Application::class);
    }

}
