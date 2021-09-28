<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Article;

class NewArticleCreated extends Mailable
{
    use Queueable, SerializesModels;

    //creo la proprietà che poi assegno al nostro oggetto nel costruttore
    protected $book;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $article = $this->article;
        return $this->view('mail.newArticle', compact('article'));
    }
}
