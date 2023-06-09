<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailCreatePassword extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name;
    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->password = $data['password'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('registro@ratsbonemagri.com.br')
                    ->subject('Conta Criada | RatsboneMagri')
                    ->view('emails.create_password')
                    ->with([                        
                        'name' => $this->name,
                        'email' => $this->email,
                        'password' => $this->password
                    ]);
    }
}
