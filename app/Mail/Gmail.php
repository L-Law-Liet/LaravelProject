<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Gmail extends Mailable
{
    use Queueable, SerializesModels;


    public $order;
    public $orderItems;
//    public $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $orderItems)
    {
        $this->order = $order;
        $this->orderItems = $orderItems;
//        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from( 'Law-Liet@gmail.com')
            ->to($this->order->email)
            ->subject('Ordering')
            ->view('mail');
    }
}
