<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SignupMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email, $first_name, $last_name, $password, $phone_number;

    public function __construct($email, $first_name, $last_name, $password, $phone_number)
    {
        $this->email = $email;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->password = $password;
        $this->phone_number = $phone_number;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Gogetit e-Naira Data Agent Portal - New Account Registration',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.signup',
            with: ['first_name' => $this->first_name],
        );
    }

    public function build()
    {

        // return new Content(
        //     view: 'email.signup',
        //     with: ['first_name' => $this->first_name],
        // );
        return 
        $this->view('email.signup')
        ->from("hello@gogetit.com.ng", "Gogetit eNaira")
        ->subject("Gogetit e-Naira Data Agent Portal - New Account Registration");
        
        // -subject("Gogetit e-Naira Data Agent Portal - New Account Registration")
    }

}