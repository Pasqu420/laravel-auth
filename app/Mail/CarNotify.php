<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $car;
    public function __construct($car)
    {
        $this->car = $car;
    }


    public function build()
    {
        return $this->view('mail.carNotify');
    }
}
