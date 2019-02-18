<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/***
 * Class BibleReference
 *
 * @package App
 *
 * @property int $id
 * @property int $book_number
 * @property int $chapter
 * @property int $verse
 * @property string $book
 * @property string $reference
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class BibleReference extends Model
{
    // region Relationships

    /**
     * A helper relationship to make front end requests simpler.
     *
     * @return HasOne
     */
    public function asv(): HasOne
    {
        return $this->hasOne(BibleText::class)->where('version', 'asv');
    }

    /**
     * A helper relationship to make front end requests simpler.
     *
     * @return HasOne
     */
    public function kjv(): HasOne
    {
        return $this->hasOne(BibleText::class)->where('version', 'kjv');
    }

    /**
     * @return HasMany
     */
    public function texts(): HasMany
    {
        return $this->hasMany(BibleText::class);
    }

    // endregion
}
