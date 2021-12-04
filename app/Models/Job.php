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
}
