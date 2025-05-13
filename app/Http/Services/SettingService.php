<?php

namespace App\Http\Services;
use App\Http\Repositories\SettingRepository;
use App\Http\Services\Impl\SettingServiceInterface;
use App\Trait\StorageImage;
use Exception;

class SettingService extends BaseService implements SettingServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return SettingRepository::class;
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
        $this->repository->update($data, (int) $id);
    }

    /**
     * @throws Exception
     */
    public function formatData(array $data): array
    {
        $input = [
            'message' => $data['message'] ?? '',
            'image' => '',
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
