<?php

namespace App\Models\Writing\Books;

use App\Enums\Misc\LanguageEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookLocalization extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'name',
        'language',
        'description',
        'author'
    ];

    protected $casts = [
        'language' => LanguageEnum::class,
    ];

    /**
     * Relation to Book
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Relation to Chapters
     */
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    /**
     * Relation to Chapters
     */
    public function scopeWithBookSlug(Builder $query): Builder
    {
        return $query
            ->leftJoin('books', 'book_localizations.book_id', '=', 'books.id')
            ->select([
                'book_localizations.*',
                'books.slug'
            ]);
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        // Разделяем строку по символу '-'
        $parts = explode('-', $value);
        $language = (string) array_pop($parts);
        $languageEnum = LanguageEnum::tryFrom($language) ?? null;
        $slug = implode('-', $parts);

        return $this->withBookSlug()
            ->where('slug', $slug)
            ->where('language', $languageEnum->value)
            ->firstOrFail();
    }
}
