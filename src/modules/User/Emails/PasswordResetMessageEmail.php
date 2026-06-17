<?php

namespace Modules\User\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetMessageEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public string $code;
    public int $ttl;

    public function __construct(string $code, int $ttl)
    {
        $this->code  = $code;
        $this->ttl = $ttl;
    }

    public function build(): PasswordResetMessageEmail
    {
        $subject = __('password.email.reset_code_subject');

        return $this->subject($subject)
            ->view('User::emails.reset-password')
            ->with([
                'ttl' => $this->ttl,
                'code'   => $this->code,
                'hello' => __('password.email.reset_code_hello'),
                'bodyText' => __('password.email.reset_code_body'),
                'warning' => __('password.email.reset_code_warning'),
            ]);
    }
}

