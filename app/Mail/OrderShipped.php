<?php

namespace App\Mail;

use App\Compaign;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var Compaign $compaign
     */
    public $compaign;/**
 * The event listener mappings for the application.
 *
 * @var array
 */
// protected $listen = [
//     'Illuminate\Mail\Events\MessageSending' => [
//         'App\Listeners\LogSendingMessage',
//     ],
//     'Illuminate\Mail\Events\MessageSent' => [
//         'App\Listeners\LogSentMessage',
//     ],
// ];

    /**
     * Create a new message instance.
     *
     * @return Compaign $template
     */
    public function __construct(Compaign $template)
    {
        $this->compaign = $template;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('compaign.send', ['order' => $this->order]);
        return $this->subject($this->campaign->name_compaign,
                                $this->campaign->content_template
                )
                    ->from('innadanylevska@gmail.com', config('app.name')) 
                    ->markdown('email.campaigns.sent');//posrednik email de cya table????  
                //     ->view('compaign.send')
                //     ->with([
                //   'order' => $this->order,
                // ]);


        //'from' => ['address' => 'example@example.com', 'name' => 'App Name'],
         // return $this->subject()
         //             ->from('example@example.com')
         //             ->to()
         //             ->view('emails.orders.shipped')
         //             //->text('emails.orders.shipped_plain');
        
    }

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('report.index');
    // }

}
