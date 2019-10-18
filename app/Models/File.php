<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\ManageFiles\ViewFiles;

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
        if ($search->get('date')) {
            $m = explode("-", $search->get('date'));
            $query->whereMonth('created_at', '=', $m[1]);
        }

        if ($search->get('category'))
            $query->whereHas('category', function ($query) use ($search) {
                $query->where('id', $search->get('category'));
            });
        if (!Auth::user()->isAdmin())
            $query->where('client_id', Auth::user()->client->id);

        $query->with('category');
        return $query->limit(10)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::deleting(function ($file) {
            $viewFiles = new ViewFiles();
            $viewFiles->deleteFile($file->url);
        });
    }

    public function getUrlAttribute()
    {
        return $this->attributes['path'];
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
