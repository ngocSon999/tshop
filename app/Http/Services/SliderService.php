<?php

namespace App\Http\Services;
use App\Http\Repositories\SliderRepository;
use App\Http\Services\Impl\SliderServiceInterface;
use App\Trait\StorageImage;
use Exception;

class SliderService extends BaseService implements SliderServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return SliderRepository::class;
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
        $about = $this->repository->findById($id);
        if ($about->image) {
            $this->deleteImage($about->image);
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
            'image' => null,
        ];

        $image = $data['image'] ?? [];
        if (!empty($image)) {
            $imagePath = $this->storageImage($image, 'sliders');
        }
        if (!empty($imagePath)) {
            $input['image'] = $imagePath;
        }

        return $input;
    }
}
