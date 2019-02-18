<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BibleReferenceResource
 *
 * @package App\Http\Resources
 */
class BibleReferenceResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        $version = $request->get('version', 'kjv');

        return [
            'book' => $this->book,
            'book_number' => $this->book_number,
            'chapter' => $this->chapter,
            'verse' => $this->verse,
            'reference' => $this->reference,
            'version' => $version,
            'text' => $this->{$version}->text
        ];
    }
}