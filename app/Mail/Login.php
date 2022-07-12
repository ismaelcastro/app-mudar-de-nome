<?php

namespace App\Mail;

use App\Models\Access;
use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Login extends Mailable
{
    use Queueable, SerializesModels;

    protected $client, $access;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->access = $access = Access::where('call_id', $client->call[0]->id)
            ->where('finish', '>=', date('Y-m-d H:i:s'))
            ->where('client_id', $client->id)
            ->orderBy('id', 'desc')->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.login')
            ->with([
                'client' => $this->client,
                'access' => $this->access
            ]);
    }
}
