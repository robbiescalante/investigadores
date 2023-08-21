<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function investigators()
    {
        return $this->belongsToMany(Investigator::class);
    }

    public function pivots()
    {
        return $this->belongsToMany(BookInvestigator::class);
    }
}
