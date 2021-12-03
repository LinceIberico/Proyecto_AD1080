<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Boda;
use Illuminate\Support\Facades\DB;

class AdminEmpleadoController extends Controller
{


    public function index(){
        
        $user = DB::select('SELECT u.name, u.email, c.categoria FROM users u, categorias c WHERE u.idCategoriaFK = c.id AND u.idCategoriaFK = 2');
        
        $bodas = Boda::orderBy('id', 'DESC')->get();
        // return dd($bodas);
        return view('admin.empleados',compact('user','bodas'));
    }
}

