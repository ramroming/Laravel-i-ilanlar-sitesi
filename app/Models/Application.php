<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    //one to one, each application is related to one and only one job
    public function job(){
        return $this->belongsTo(Job::class);
    }

    //one to one, each application is related to one and only one user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
