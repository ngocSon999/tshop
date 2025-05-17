<?php

namespace App\Http\Services;
use App\Http\Repositories\Impl\SettingRepoInterface;
use App\Http\Services\Impl\SettingServiceInterface;
use App\Trait\StorageImage;
use Exception;
use Illuminate\Http\UploadedFile;

class SettingService extends BaseService implements SettingServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return SettingRepoInterface::class;
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
        $setting = $this->repository->findById($id);
        foreach ($data as $key => $value) {
            if ($key === 'logo'  && $value instanceof UploadedFile) {
                $data = [
                    $key => $key,
                    'value' => $this->storageImage($value, 'settings')
                ];
                if ($setting->value) {
                    $this->deleteImage($setting->value);
                }
            } else {
                $data = [
                    $key => $key,
                    'value' => $value
                ];
            }
        }

        $this->repository->update($data, (int) $id);
    }
}
