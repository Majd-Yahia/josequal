<?php

namespace App\Traits;

use App\Filters\ActiveFilter;
use Illuminate\Support\Facades\Pipeline;

trait Filterable
{
    // Return empty array if no filters applied
    // public function getFilters(): array { return []; }
    abstract public function getFilters(): array;

    public function scopeFilters($query)
    {
        $filters = [
            'active' => ActiveFilter::class,
            ...$this->getFilters(),
        ];

        // Use array_unique to remove duplicates based on class names
        $uniqueFilters = array_unique($filters, SORT_REGULAR);

        // Now, you can pass $uniqueFilters to the Pipeline
        Pipeline::send($query)
            ->through($uniqueFilters)
            ->thenReturn();

        return  $query;
    }
}
