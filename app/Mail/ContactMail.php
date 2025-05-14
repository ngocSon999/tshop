<?php

namespace App\Mail;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $content;
    public $attachments;
    /**
     * Create a new message instance.
     */
    public function __construct($content, array $attachments)
    {
        $this->content = $content;
        $this->attachments = $attachments;
    }

    /**
     * @throws Exception
     */
    public function build(): ContactMail
    {
        try {
            $email = $this->subject(__('translation.sendMail.subject'))
                ->view('emails.contact')
                ->with(['content' => $this->content]);

            if (!empty($this->attachments) && is_array($this->attachments)) {
//                foreach ($this->attachments as $url) {
//                    $relativePath = str_replace('/storage/', '', $url);
//                    $absolutePath = Storage::disk('public')->path($relativePath);
//                    if (file_exists($absolutePath)) {
//                        $email->attach($absolutePath);
//                    } else {
//                        Log::error('File not found at absolute path: ' . $absolutePath);
//                    }
//                }
                foreach ($this->attachments as $attachment) {
                    $email->attach($attachment['file'], $attachment['options']);
                }
            }

            return $email;
        } catch (Exception $e) {
            Log::error('Error sending email: ' . $e->getMessage());
            throw new Exception('Error sending email: ' . $e->getMessage());
        }
    }
}
