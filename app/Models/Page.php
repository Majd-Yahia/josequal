<?php

namespace App\Models;

use App\Filters\ActiveFilter;
use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'active',
    ];

    public function getFilters(): array
    {
        return [
            ActiveFilter::class
        ];
    }
}
