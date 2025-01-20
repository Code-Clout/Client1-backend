<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnrolledStudentsConformationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student; // Declare a public property to hold student data

    public function __construct($student)
    {
        $this->student = $student; // Assign the data to the property
    }

    public function build()
    {
        return $this->subject('🎉 Enrolled Successfully')
                    ->view('Mail.StudentRegistrationConfirmationMail')
                    ->with(['student' => $this->student]); // Pass data to the view
    }
}
