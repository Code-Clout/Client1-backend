<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class StudentTestMail extends Mailable
{
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
        return $this->subject('✅ Details Verified – Your Test Awaits!')
                    ->view('Mail.StudentTestMail');
    }
}
