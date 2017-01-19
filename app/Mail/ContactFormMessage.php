<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $name;
    public $contactMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->email = $request->input('email');
        $this->name = $request->input('name');
        $this->contactMessage = $request->input('message');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to(config('mail.admin.address'))
            ->subject('New message from ' . config('app.name'))
            ->from($this->email)
            ->view('emails.contact');
    }
}
