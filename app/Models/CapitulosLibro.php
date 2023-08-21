<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitulosLibro extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    public function capitulosLibro()
    {
        return $this->hasMany(Investigator::class);
    }

}
