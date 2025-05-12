<?php

namespace App\Http\Services;
use App\Http\Repositories\Impl\BaseRepoInterface;
use App\Http\Services\Impl\BaseServiceInterface;
use Illuminate\Http\Request;

abstract class BaseService implements BaseServiceInterface
{
    protected BaseRepoInterface $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    abstract public function repository(): string;

    private function setRepository(): void
    {
        $repository = app($this->repository());
        if (!$repository instanceof BaseRepoInterface) {
            throw new \InvalidArgumentException(
                'The result of the repository() method must be an instance of App\Http\Repositories\Impl\UserRepoInterface'
            );
        }
        $this->repository = $repository;
    }

    public function create(array $data): void
    {
        $this->repository->create($data);
    }

    public function getListDataTable(Request $request): array
    {
        return $this->repository->pagination($request);
    }

    public function update(array $data, $id): void
    {
        $this->repository->update($data, (int) $id);
    }

    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findById(int $id)
    {
        return $this->repository->findById($id);
    }
}
