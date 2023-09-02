<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KmlFiles extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [
        'file_name',
        'file_size',
        'url',
        'user_id',
        'active',
        'is_default'
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getFilters(): array
    {
        return [];
    }
}
