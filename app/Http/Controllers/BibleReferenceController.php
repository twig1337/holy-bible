<?php

namespace App\Http\Controllers;

use App\BibleReference;
use App\Http\Resources\BibleReferenceResource;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class BibleReferenceController
 *
 * @package App\Http\Controllers
 */
class BibleReferenceController extends Controller
{
    /**
     * @param string  $book
     * @param int     $chapter
     * @param int     $verse
     *
     * @param Request $request
     *
     * @return BibleReferenceResource
     * @throws \Illuminate\Validation\ValidationException
     */
    public function read(string $book, int $chapter, int $verse, Request $request): BibleReferenceResource
    {
        $this->validate($request, [
            'version' => 'in:kjv,asv'
        ], [
            'version.in' => 'The selected version is invalid. Valid options are: KJV, ASV.'
        ]);

        if (!$reference = BibleReference::where(compact('book', 'chapter', 'verse'))->first()) {
            throw new NotFoundHttpException('Verse requested does not exist.');
        }

        return new BibleReferenceResource($reference);
    }
}
