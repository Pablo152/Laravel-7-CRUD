<?php

namespace App\Mail;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PDF;

class TestMailable extends Mailable
{
    use Queueable, SerializesModels;


    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $products = Product::all();
        $this->pdf = PDF::loadView('products/index', compact('products'));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('CRUD PDF')->view('emails/pdfemail')
            ->attachData($this->pdf->output(), "data.pdf");
    }
}
