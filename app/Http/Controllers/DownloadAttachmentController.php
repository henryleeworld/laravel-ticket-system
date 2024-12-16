<?php

namespace App\Http\Controllers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DownloadAttachmentController extends Controller
{
    /**
     * Provision a new web server.
     */
    public function __invoke(Media $mediaItem)
    {
        return response()->download($mediaItem->getPath(), $mediaItem->file_name);
    }
}