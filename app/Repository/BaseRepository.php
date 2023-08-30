<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model = null;
    protected $perPage = 15;

    // This might not be needed.
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    public function getListWithFilters(array $with = [], array $columns = ["*"]): Collection | array | null
    {
        return $this->model::query()
            ->with($with)
            ->select($columns)
            ->filters()
            ->get();
    }

    public function paginatedListWithFilters(array $with = [], $columns = ["*"], int $perPage = 0): Collection | array | null
    {
        $this->perPage = $perPage > 0 ? $perPage : $this->perPage;

        return $this->model::query()
            ->with($with)
            ->select($columns)
            ->filters()
            ->paginate($perPage);
    }

    public function findById(int $id, array $columns = ["*"], array $with = []): Collection | Model | null
    {
        return $this->model::query()
            ->with($with)
            ->select($columns)
            ->findOrFail($id);
    }

    public function editById(int $id, array $data = []): Collection | Model
    {
        $model = $this->findById($id);
        $model->update($data);
        return $model;
    }

    public function deleteById(int $id): Collection | Model | null
    {
        $model = $this->model::query()->findOrFail($id);
        $model->delete();
        return $model;
    }
}
