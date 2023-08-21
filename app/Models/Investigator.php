<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Investigator extends Model
{
    use HasFactory;

    protected $with = ['users'];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function($query, $search){
            $complete = strpos($search, ' ');
            $part1 = substr($search, 0, $complete);
            $part2 = substr($search, $complete+1);
            $titles = DB::table('titles')
            ->where('full', '=', $part1)
            ->orWhere('abr', '=', $part1)
            ->orWhere('abrwp', '=', $part1)
            ->value('id');

            if(empty($titles)) {
                $query
                    ->where('name', 'like', '%' . $search . '%');
            } else {
                $query
                ->where('title_id', '=', $titles)
                ->where('name', 'like', '%' . $part2 . '%');
            }

        });

    }

    public function publications()
    {
        return $this->belongsToMany(Publication::class, 'publication_investigator');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_investigator')->withPivot('category_id');
    }

    public function sites()
    {
        return $this->belongsToMany(Site::class, 'sites_investigator');
    }

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function studies()
    {
        return $this->hasMany(Study::class);
    }

    public function institutes()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
