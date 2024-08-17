<?php

namespace App\Models\Writing\Books;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_localization_id',
        'number',
        'title',
        'content',
    ];

    /**
     * 
     */
    public function bookLocalization(): BelongsTo
    {
        return $this->belongsTo(BookLocalization::class);
    }
}
