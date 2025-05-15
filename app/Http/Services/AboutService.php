<?php

namespace App\Http\Services;
use App\Http\Repositories\AboutRepository;
use App\Http\Services\Impl\AboutServiceInterface;
use App\Trait\StorageImage;
use Exception;

class AboutService extends BaseService implements AboutServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return AboutRepository::class;
    }

    public function getOne()
    {
        return $this->repository->getOne();
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
            $about = $this->repository->findById($id);
            if ($about->image) {
                $this->deleteImage($about->image);
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
            'message' => $data['message'] ?? '',
        ];

        $image = $data['image'] ?? [];
        if (!empty($image)) {
            $imagePath = $this->storageImage($image, 'sliders');
            $input['image'] = $imagePath;
        }

        return $input;
    }
}
