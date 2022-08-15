<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateBankRequestClose extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'support@pridegames.com';
        $name = 'Update bank or UPI Request Close';
        $id = $this->data['id'];
        $user_name = $this->data['user_name'];
        $request_type = $this->data['request_type'];
        $reasons = $this->data['reasons'];
        $status = $this->data['new_status'];

        $subject = $user_name.' '.'Bank or UPI Request Updated';

        return $this->view('admin.mail.UpdateBankReqClose',compact('id','user_name','reasons','status'))
        ->from($address, $name)
        ->replyTo($address, $name)
        ->subject($subject);
    }
}
