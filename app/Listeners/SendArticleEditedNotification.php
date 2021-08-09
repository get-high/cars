<?php

namespace App\Listeners;

use App\Events\ArticleEdited;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendArticleEditedNotification
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
     * @param  ArticleEdited  $event
     * @return void
     */
    public function handle(ArticleEdited $event)
    {
        if(!empty(config('mail.admin'))) {
            Mail::to(config('mail.admin'))->send(new \App\Mail\ArticleEdited($event->article));
        }
    }
}
