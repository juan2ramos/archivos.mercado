<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['mime', 'name', 'extension', 'path', 'year', 'month', 'directory','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
