<?php

namespace App\Http\Services;
use App\Http\Repositories\ContactRepository;
use App\Http\Services\Impl\ContactServiceInterface;
use App\Trait\StorageImage;
use Exception;

class ContactService extends BaseService implements ContactServiceInterface
{
    use StorageImage;
    public function repository(): string
    {
        return ContactRepository::class;
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
        $this->repository->update($data, (int) $id);
    }

    /**
     * @throws Exception
     */
    public function formatData(array $data): array
    {
        return [
            'name' => $data['name'] ?? '',
            'phone' => $data['phone'] ?? '',
            'email' => $data['email'] ?? '',
            'message' => $data['message'] ?? '',
        ];
    }

    /**
     * @throws Exception
     */
    public function updateStatus($data): void
    {
        $id = $data['id'] ?? null;
        if (empty($id)) {
            throw new Exception('ID is required');
        }
        $contact = $this->repository->findById((int) $id);
        if (empty($contact)) {
            throw new Exception('Contact not found');
        }
        $input = [
            'status' => (int) $data['status'] ?? 0,
        ];

        $this->repository->update($input, (int) $id);
    }
}
