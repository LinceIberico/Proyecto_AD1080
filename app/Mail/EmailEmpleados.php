<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailEmpleados extends Mailable
{
    use Queueable, SerializesModels;

    public $subjet = "Información de próxima boda";
    public $datosBoda;
    public $pdf;

    public function __construct($datosBoda)
    {
        // $this->pdf = $pdf;
        $this->datosBoda = $datosBoda;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return dd($this->contacto);
         return $this->view('email.enviarBodaEmpleado');
        //  ->with([
        //      'nomBoda' => $this->datosBoda['nomBoda'],
        //  ]);
        // ->attchData($this->pdf, 'boda.pdf', ['mime' => 'application/pdf']);
    }
}
