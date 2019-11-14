<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name', 'pages', 'user_id'];

    protected $casts = [
        'pages' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        // TODO: Investigate =_=
        // static::addGlobalScope('userBooks', function ($query) {
        //     return $query->where('user_id', auth()->id());
        // });

        // static::creating(function ($book) {
        //     $book->user_id = auth()->id();
        // });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function readingSessions()
    {
        return $this->hasMany(ReadingSession::class);
    }

    public function getStatusAttribute()
    {
        if ($lastSession = $this->readingSessions()->latest()->first()) {
            return '<span class="font-semibold ' . $lastSession->percentage_class . '">' .  $lastSession->percentage_read . '</span>';
        }
    }
}
