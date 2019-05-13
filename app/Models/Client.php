<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['business_name', 'nit', 'address', 'verification_code'];
    protected $appends = ['full_nit'];

    public function getRouteKeyName()
    {
        return 'nit';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where('NIT', 'like', '%' . $search . '%')
            ->OrWhere('business_name', 'like', '%' . $search . '%')->with('user')->get();
    }

    public function getFullNitAttribute()
    {
        return  "{$this->attributes['nit']} - {$this->attributes['verification_code']}";

    }

}
