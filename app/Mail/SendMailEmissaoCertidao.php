<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailEmissaoCertidao extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $title)
    {
        $this->client = $client;
        $this->title = $title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('registro@ratsbonemagri.com.br')
            ->subject("{$this->title} - {$this->client->id} - {$this->client->name}")
            ->view('emails.emissao_certidao', ['client' => $this->client, 'title' => $this->title]);
    }
}
