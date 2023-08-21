<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function investigators()
    {
        return $this->belongsToMany(Investigator::class, 'category_investigator')->withPivot('inv_id');
    }

}
