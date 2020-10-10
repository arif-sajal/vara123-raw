<?php

namespace App\Mail\Front\CustomerProfile;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequestEmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $verification;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $verification)
    {
        $this->customer = $customer;
        $this->verification = $verification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.front.customerProfile.requestEmailVerification');
    }
}
