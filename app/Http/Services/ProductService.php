<?php

namespace App\Http\Services;
use App\Http\Repositories\ProductRepository;
use App\Http\Services\Impl\ProductServiceInterface;
use App\Trait\StorageImage;
use Exception;

class ProductService extends BaseService implements ProductServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return ProductRepository::class;
    }

    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        list($data, $imagePaths) = $this->formatData($data);
        $product = $this->repository->create($data);
        if (!empty($imagePaths)) {
            foreach ($imagePaths as $imagePath) {
               $product->images()->create([
                    'image' => $imagePath,
                ]);
            }
        }
    }

    /**
     * @throws Exception
     */
    public function update(array $data, $id): void
    {
        list($data, $imagePaths) = $this->formatData($data);
        $product = $this->repository->findById($id);
        if ($product->image) {
            $this->deleteImage($product->image);
        }
        foreach ($product->images as $image) {
            $this->deleteImage($image->image);
            $image->delete();
        }
        if (!empty($imagePaths)) {
            foreach ($imagePaths as $imagePath) {
                $product->images()->create([
                    'image' => $imagePath,
                ]);
            }
        }
        $this->repository->update($data, (int) $id);
    }

    /**
     * @throws Exception
     */
    public function formatData(array $data): array
    {
        $input = [
            'name' => $data['name'] ?? '',
            'title' => $data['title'] ?? '',
            'description' => $data['description'] ?? '',
            'price' => $data['price'] ?? 0,
            'category_id' => $data['category_id'] ?? null,
        ];

        $images = $data['image'] ?? [];
        $imagePaths = $this->storageImages($images, 'products');
        if (!empty($imagePaths)) {
            $input['image'] = $imagePaths[0];
        }

        return [$input, $imagePaths];
    }

    public function findByCategory($id)
    {
        return $this->repository->findByCategory($id);
    }
}
