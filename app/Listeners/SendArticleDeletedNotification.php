<?php

namespace App\Listeners;

use App\Events\ArticleDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendArticleDeletedNotification
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
     * @param  ArticleDeleted  $event
     * @return void
     */
    public function handle(ArticleDeleted $event)
    {
        if(!empty(config('mail.admin'))) {
            Mail::to(config('mail.admin'))->send(new \App\Mail\ArticleDeleted($event->article));
        }
    }
}
