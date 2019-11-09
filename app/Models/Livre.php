<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = ['title', 'pages', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }
}
