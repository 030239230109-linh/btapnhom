<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $cart;

    public function __construct($user, $cart)
    {
        $this->user = $user;
        $this->cart = $cart;
    }

    public function build()
    {
        return $this->subject('Đặt hàng thành công')
                    ->view('emails.order_success');
    }
}