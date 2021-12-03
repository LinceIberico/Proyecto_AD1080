<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Boda;
use App\Models\Presupuesto;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){ //Aqui vamos a retornar a la vista del admin
        
        $users = User::latest()->take(5)->get();
        $bodas = Boda::latest()->take(5)->get();
        $presupuestos = Presupuesto::latest()->take(5)->get();
        //SELECT * FROM `users` ORDER BY created_at DESC LIMIT 5//
        //return $users;
        return view('admin.cms',compact('users','bodas','presupuestos'));
    }

    
}
