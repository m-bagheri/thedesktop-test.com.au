<?php

namespace App\Listeners;

use App\Events\BookAddedEvent;
use App\Mail\BookAddedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendBookAddedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\BookAddedEvent  $event
     * @return void
     */
    public function handle(BookAddedEvent $event)
    {
        $book = $event->book;
        Mail::to(env('DEFAULT_MAIL_TO', 'tech@thedesktop.com.au'))->send(new BookAddedMail($book));
    }
}
