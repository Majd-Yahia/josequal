<?php

namespace App\Models;

use Spatie\MediaLibrary\MediaCollections\Models\Media as BaseMedia;
use Str;

class Media extends BaseMedia
{
    // Define an accessor for file size in MB
    public function getFileSizeAttribute()
    {
        $size = (int) $this->size;
        $base = log($size) / log(1024);
        $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

        return round(pow(1024, $base - floor($base)), 2) . $suffixes[floor($base)];
    }

    public function getShortFileNameAttribute()
    {
        return Str::limit($this->name, 32, $end=`...`) ;
    }

    public function getFirstUrlAttribute()
    {
        return $this->getUrl();
    }

    public function getCollectionNameAttribute($value)
    {
        return strtoupper($value);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'model_id');
    }
}
