<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailNotification extends Mailable
{
    use Queueable, SerializesModels;
    
    public $aviso, $file_attach;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $data)
    {
        $this->aviso = $data['aviso'];
        $this->file_attach = $data['file_attach'] ?? null;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =  $this->from('registro@ratsbonemagri.com.br')
                ->subject('Aviso | RatsboneMagri')
                ->view('emails.notification')                    
                ->with([                        
                    'aviso' => $this->aviso
                ]);

                if(!is_null($this->file_attach))
                    $mail = $mail->attach(storage_path($this->file_attach));
        return $mail;
    }
}
