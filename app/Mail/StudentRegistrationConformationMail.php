<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRegistrationConformationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;
    public $lastName;
    public $paymentLink;

    public function __construct($firstName, $lastName, $paymentLink)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->paymentLink = $paymentLink;
    }

    public function build()
    {
        return $this->subject('🎉 Your First Step to Success – Complete Payment & Take the Exam!')
                    ->view('Mail.StudentRegistrationConfirmationMail')
                    ->with([
                        'firstName' => $this->firstName,
                        'lastName' => $this->lastName,
                        'paymentLink' => $this->paymentLink,
                    ]);
    }
}