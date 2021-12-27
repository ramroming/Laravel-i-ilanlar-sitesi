<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

#one to one , each profile belongs to one and only one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
