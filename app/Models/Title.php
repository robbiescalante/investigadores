<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function investigators()
    {
        return $this->belongsToMany(Investigator::class);
    }
}
