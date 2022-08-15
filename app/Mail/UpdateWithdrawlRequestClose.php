<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateWithdrawlRequestClose extends Mailable
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
        $name = 'Withdrawl Money Request Close';
        $id = $this->data['id'];
        $user_name = $this->data['user_name'];
        $request_type = $this->data['request_type'];
        $amount = $this->data['amount'];
        $reasons = $this->data['reasons'];
        $status = $this->data['new_status'];

        $subject = 'Rs.'. ' '. $amount.' '.'Withdrawl Money Request Updated';

        return $this->view('admin.mail.UpdateWithdrawlMoneyClose',compact('id','user_name','amount','reasons','status'))
        ->from($address, $name)
        ->replyTo($address, $name)
        ->subject($subject);
    }
}
