<?php

namespace App\Http\Controllers;

use App\Mail\EmailContactoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    public function index(){

        $emailUsuario = Auth::user()->email;
        //return $emailUsuario;
        return view('contacto', compact('emailUsuario'));
    }

    public function enviarEmailContacto(Request $request){

        $request->validate([
            'nombreContacto' => 'required',
            'fechaContacto' => 'required',
            'emailContacto' => 'required|email',
            'tlfContacto' => 'required',
            'mensajeContacto' => 'required',
        ]);
        
        $emailEmpresa = 'adriansanchezmillan@gmail.com';
        $emailUsuario = $request->email;

        $destinatario = [ $emailEmpresa  , $emailUsuario];
        // return dd($request->all());

        $correo = new EmailContactoController($request->all());

        //Mail::to('admin@gmail.com')->send($correo);

        Mail::to($destinatario)->send($correo);

        return redirect()->route('miBoda');
    }
}
