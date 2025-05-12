<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Impl\BaseRepoInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepoInterface
{
    /**
     * @var Model
     */
    protected Model $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function model(): string;

    protected function setModel(): void
    {
        $model = app($this->model());
        if (!$model instanceof Model) {
            throw new \InvalidArgumentException(
                'The result of the model() method must be an instance of Illuminate\Database\Eloquent\Model'
            );
        }
        $this->model = $model;
    }

    public function create(array $data): Model
    {
        $model = $this->model;
        $model->fill($data);
        $model->save();

        return $model;
    }

    public function update(array $data, int $id): Model|null
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->fill($data);
            $model->save();

            return $model;
        }

        return null;
    }
    public function delete(int $id): void
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->delete();
        }
    }
    public function findById(int $id)
    {
        return $this->model->find($id);
    }
    public function findAll(): Collection
    {
        return $this->model->all();
    }
}
