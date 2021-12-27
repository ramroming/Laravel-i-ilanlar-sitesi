<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    use HasFactory;

 // each cv had one and only one category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //each cv belongs to one and only one user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
