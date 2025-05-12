<?php

namespace App\Http\Services;
use App\Http\Repositories\CategoryRepository;
use App\Http\Services\Impl\CategoryServiceInterface;
use App\Trait\StorageImage;

class CategoryService extends BaseService implements CategoryServiceInterface
{
    use StorageImage;

    public function repository(): string
    {
        return CategoryRepository::class;
    }

    public function create($data): void
    {
        $data = $this->formatData($data);
        $this->repository->create($data);
    }

    public function update($data, $id): void
    {
        $data = $this->formatData($data);
        $category = $this->repository->findById($id);
        if ($category->image) {
            $this->deleteImage($category->image);
        }

        $this->repository->update($data, (int) $id);
    }

    public function formatData($data): array
    {
        $input['name'] = $data['name'];
        $input['description'] = $data['description'];
        if (!empty($data['image'])) {
            $image = $data['image'];
            $imagePaths = $this->storageImage($image, 'categories');
            $input['image'] = $imagePaths;
        }

        return $input;
    }
}
