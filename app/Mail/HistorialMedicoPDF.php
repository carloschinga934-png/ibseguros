<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HistorialMedicoPDF extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfContent;
    public $cliente;

    public function __construct($pdfContent, $cliente)
    {
        $this->pdfContent = $pdfContent;
        $this->cliente = $cliente;
    }

    public function build()
    {
        return $this->markdown('emails.historial-medico')
            ->subject('Tu Historial Médico')
            ->attachData(
                $this->pdfContent, 
                'historial-medico.pdf', 
                [
                    'mime' => 'application/pdf',
                ]
            );
    }
}
