<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    protected $fillable = ['mime', 'name', 'extension', 'path', 'year', 'month', 'directory', 'category_id'];

    public function getPathAttribute($value)
    {
        return Storage::temporaryUrl($value, now()->addMinutes(30));
    }

    public function scopeSearch($query, $search)
    {
        $query = $query->where('name', 'like', '%' . $search->get('search') . '%');
        if ($search->get('year'))
            $query->where('year', $search->get('year'));
        if ($search->get('month'))
            $query->where('month', $search->get('month'));
        if ($search->get('category'))
            $query->whereHas('category', function ($query) use ($search) {
                $query->where('id', $search->get('category'));
            });
        $query->with('category');
        return $query->limit(10)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
