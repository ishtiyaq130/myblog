<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $users;

    public function __construct($users)
    {
        $this->users = $users;
    }

    public function build()
{
    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        Carbon::now()->addMinutes(60),
        ['user_id' => $this->users->user_id, 'hash' => sha1($this->users->email)]
    );

    // dd($verificationUrl); // Debugging line

    return $this->view('emails.verify-email')
        ->with([
            'verificationUrl' => $verificationUrl,
            'users' => $this->users,
        ]);
}

}
