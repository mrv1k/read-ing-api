<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $fillable = ['start', 'end', 'livre_id'];

    protected $casts = ['start' => 'integer', 'end' => 'integer'];

    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    public function getPagesReadAttribute()
    {
        return $this->end - $this->start;
    }

    public function getPercentageReadAttribute()
    {
        return ceil(($this->end / $this->livre->pages) * 100);
    }
}
