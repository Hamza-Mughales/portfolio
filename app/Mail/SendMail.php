<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\about as About;     // Using about model to get the email reciever

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->about= new About();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $About = $this->about->get_about();
        $receiver_email = $About->email;

                return $this //->from($receiver_email)
                    //->subject('New From My Portfolio')
                    ->view('sendemail')
                    ->with('data', $this->data)
        ;
    }
}
