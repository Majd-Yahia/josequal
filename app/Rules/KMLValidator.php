<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Http\UploadedFile;

class KMLValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!$value instanceof UploadedFile) {
            $fail('The :attribute must be a file type');
        }

        // Check if the MIME type is "application/vnd.google-earth.kml+xml"
        if ($value->getMimeType() !== 'application/vnd.google-earth.kml+xml' && $value->getClientOriginalExtension() !== 'xml') {
            $fail('The :attribute must have a mimetype of application/vnd.google-earth.kml+xml or .xml');
        }

    }

    public function message()
    {
        return 'The :attribute must be a KML file (MIME type: application/vnd.google-earth.kml+xml) or have a "kml" file extension.';
    }
}
