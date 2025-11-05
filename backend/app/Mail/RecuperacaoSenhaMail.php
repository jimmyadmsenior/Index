<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecuperacaoSenhaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $codigo;

    public function __construct($codigo)
    {
        $this->codigo = $codigo;
    }

    public function build()
    {
        return $this->subject('Código de Recuperação de Senha')
            ->view('emails.recuperacao_senha')
            ->with(['codigo' => $this->codigo]);
    }
}
