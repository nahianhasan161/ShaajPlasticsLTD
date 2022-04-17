<?php

namespace App\Mail;

use App\Models\PlasticProduct;
use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data ;
    public $product ;
  /*   protected $casts = [
        'data' => 'array',
        'product' => 'array'
    ]; */
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $data, $product)
    {
        $this->data = Request::find($data);
        $this->product = PlasticProduct::find($product);

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order')
       /*  ->attach(asset($this->product->image)) */;
    }
}
