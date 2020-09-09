<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.

     *
     * @return void
     */
    protected $customer;
    protected $cart;
    protected $id_order;

    public function __construct($customer, $cart, $id_order)
    {
        //
        $this->customer = $customer;
        $this->cart = $cart;
        $this->id_order = $id_order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('long11@gmail.com')->view('web.form')->with(['customer'=> $this->customer, 'cart'=> $this->cart, 'id_order'=> $this->id_order]);
    }
}
