<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingSession extends Model
{
    protected $fillable = ['book_id', 'start', 'end'];

    protected $casts = ['start' => 'integer', 'end' => 'integer'];

    public function getPagesReadAttribute()
    {
        return $this->end - $this->start;
    }

    public function getPercentageReadNumberAttribute()
    {
        return ceil(($this->end / $this->book->pages) * 100);
    }

    public function getPercentageReadAttribute()
    {
        return $this->percentage_read_number . '%';
    }

    public function getReadDateAttribute()
    {
        return $this->created_at->format('F jS, Y');
    }

    public function getPercentageClassAttribute()
    {
        if (($this->percentage_read_number > 66)) {
            return 'text-green-500';
        }
        if (($this->percentage_read_number > 33)) {
            return 'text-yellow-600';
        }
        return 'text-red-400';
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
