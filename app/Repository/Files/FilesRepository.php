<?php

namespace App\Repository\Files;

use App\Models\KmlFiles;
use App\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class FilesRepository extends BaseRepository
{
    protected $model = KmlFiles::class;
    protected $perPage = 15;

    public function getDefaultKMLUrl(): string | null
    {
       $model = $this->model::query()
            ->where('is_default', true)
            ->first();

        if(!isset($model)) { return null; }

        return $model?->url;
    }
}
