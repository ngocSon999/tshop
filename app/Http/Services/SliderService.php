<?php

namespace App\Http\Services;
use App\Http\Repositories\Impl\SliderRepoInterface;
use App\Http\Services\Impl\SliderServiceInterface;
use App\Trait\StorageImage;
use Exception;

class SliderService extends BaseService implements SliderServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return SliderRepoInterface::class;
    }

    /**
     * @throws Exception
     */
    public function create(array $data): void
    {
        $data = $this->formatData($data);
        $this->repository->create($data);
    }

    /**
     * @throws Exception
     */
    public function update(array $data, $id): void
    {
        $data = $this->formatData($data);
        if (isset($data['image'])) {
            $slider = $this->repository->findById($id);
            if ($slider->image) {
                $this->deleteImage($slider->image);
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
            'name' => $data['name'] ?? null,
            'title' => $data['title'] ?? null,
            'link' => $data['link'] ?? null,
        ];

        $image = $data['image'] ?? [];
        if (!empty($image)) {
            $imagePath = $this->storageImage($image, 'sliders');
            $input['image'] = $imagePath;
        }

        return $input;
    }
}
