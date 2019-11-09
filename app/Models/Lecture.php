<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['start', 'end', 'livre_id'];

    protected $casts = ['start' => 'integer', 'end' => 'integer'];

    public function livres()
    {
        return $this->belongsTo(Livre::class);
    }
}
