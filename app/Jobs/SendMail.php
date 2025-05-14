<?php

namespace App\Jobs;

use App\Mail\ContactMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public string $email;
    public string $content;
    public string $locale;
    public array $attachments;
    /**
     * Create a new job instance.
     */
    public function __construct($email, $content, $attachments, $locale)
    {
        $this->email = $email;
        $this->content = $content;
        $this->locale = $locale;
        $this->attachments = $attachments;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        App::setLocale($this->locale);
        Mail::to($this->email)->send(new ContactMail($this->content, $this->attachments));
    }
}
