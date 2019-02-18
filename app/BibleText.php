<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class BibleText
 *
 * @package App
 *
 * @property int $id
 * @property int $bible_reference_id
 * @property string $version
 * @property string $text
 */
class BibleText extends Model
{
    /** {@inheritDoc} */
    public $timestamps = false;

    // region Relationships

    /**
     * @return BelongsTo
     */
    public function bibleReference(): BelongsTo
    {
        return $this->belongsTo(BibleReference::class);
    }

    // endregion
}
