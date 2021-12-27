<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $appends = [
      'parent',
    ];

    #one to many , get the jobs of the category / has many
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    #one to many inverse ( each category has one parent)
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    #one to many ( each parent has one or more sub categories)
    public function children()
    {
        return $this->hasMany(Category::class,'parent_id');
    }

    #one to many , get the cvs of the same category / has many
    public function cvs()
    {
        return $this->hasMany(Cv::class);
    }


}
