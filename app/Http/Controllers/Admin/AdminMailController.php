<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\EmailEmpleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Boda;

class AdminMailController extends Controller
{
    public function enviarMailBodaEmpleado(Request $request){        
        
        $emailEmpresa = 'admin@gmail.com';
        $emailUsuarios = $request->emailUsuarios;
        $boda = Boda::where('id',$request->comboBodaEmpleado)->get();

        //$datosBoda['emailEmpresa'] = $emailEmpresa;

        // $datosBoda['nomBoda'] = $boda->nomBoda;
        // $datosBoda['fechaBoda'] = $boda->fechaBoda;
        // $datosBoda['horaBoda'] = $boda->horaBoda;
        // $datosBoda['ceremonia'] = $boda->ceremonia;
        // $datosBoda['celebracion'] = $boda->celebracion;
        // $datosBoda['nomNovio'] = $boda->nomNovio;
        // $datosBoda['tlfNovio'] = $boda->tlfNovio;
        // $datosBoda['dirNovio'] = $boda->dirNovio;
        // $datosBoda['emailNovio'] = $boda->emailNovio;
        // $datosBoda['nomNovia'] = $boda->nomNovia;
        // $datosBoda['tlfNovia'] = $boda->tlfNovia;
        // $datosBoda['dirNovia'] = $boda->dirNovia;
        // $datosBoda['emailNovia'] = $boda->emailNovia;


        //$pdf = PDF::loadView('email.enviarBodaEmpleado',$datosBoda);
            
        // return dd($boda->all());
        $destinatario = [ $emailEmpresa  , $emailUsuarios];
        $correo = new EmailEmpleados($boda->all());
        Mail::to($emailEmpresa)->cc($emailUsuarios)->send($correo);

        return redirect()->route('admin.empleados');

        // Mail::send('mail', $datosBoda, function($contenido) use ($datosBoda, $pdf){
        //     $contenido->to($datosBoda['emailEmpresa'])
        //     ->attachData($pdf->output(),"test.pdf");
        // });
            

        
        // $arrayEmailUsuarios = array();
        // foreach($emailUsuarios as $valor){
        //     array_push($arrayEmailUsuarios,$valor);
        // }
        // return dd($request->emailUsuarios);

        //$boda = Boda::find($boda->id);
        
        
        
        //return "enviado";

        //$correo = Boda::where('id',11);


        //return dd($request->all());
        // return view('email.mostrarBodaEmpleado', compact('boda'));        
        
    }
    
}
