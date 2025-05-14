<?php

namespace App\Http\Services;
use App\Http\Repositories\ContactRepository;
use App\Http\Services\Impl\ContactServiceInterface;
use App\Jobs\SendMail;
use App\Mail\ContactMail;
use App\Trait\StorageImage;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
     * @param array $data
     * @throws Exception
     */
    public function updateStatus(array $data)
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

        return $this->repository->update($input, (int) $id);
    }

    /**
     * @throws Exception
     */
    public function sendMail(array $data, array $attachments = []): void
    {
        try {
            if (!empty($data['email'])) {
                $email = $data['email'];
                $content = $data['content'];
                $locale = Session::get('locale') ?? App::getLocale();

                Mail::to($email)->send(new ContactMail($content, $attachments));
//                SendMail::dispatch($email, $content, $attachments, $locale);
            } else {
                throw new Exception('Email is required');
            }
        } catch (Exception $e) {
            throw new Exception('Error sending email: ' . $e->getMessage());
        }
    }
}
