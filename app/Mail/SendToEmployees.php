<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendToEmployees extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $message;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message =$message; 
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->message->senderEmail, $this->message->senderName)
        ->subject($this->message->subject)
        ->to($this->message->email)
        ->markdown('employee.emails')->with([
            'message' => $this->message->message,
            'sender' => $this->message->senderName,
            'subject' => $this->message->subject,
        ]);        
}
    }

