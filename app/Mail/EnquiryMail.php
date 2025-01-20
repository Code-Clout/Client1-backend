<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public function build()
    {
        return $this->subject('🎉 Enquiry Mail')
                    ->view('Mail.EnquiryMail'); 
    }
}
