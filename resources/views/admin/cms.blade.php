@extends('adminlte::page')

@section('title', 'AD1080')

@section('content_header')
    <h1>Bienvenido {{ Auth::user()->name }}, resumen de registros actualizados.</h1>
@stop

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-xl sm:rounded-lg">

             <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap flex-sm-wrap flex-xl-column ">
                            <div class="mx-auto">
                                <div>
                                    <h3 class="text-danger">Últimos Registros de Usuarios.</h3>
                                    @foreach ($users as $user)
                                        <h5><span class="text-info">Usuario: </span>@if ($user->name == null)"Sin registros en la base de datos"@endif{{$user->name}}, <span class="text-info">Email: </span>@if ($user->email == null)"Sin registros en la base de datos"@endif{{$user->email}}, <span class="text-info">Creado </span>@if ($user->created_at == null)"Sin registros en la base de datos"@endif{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</h5>
                                    @endforeach
                                </div>
                                <br>
                                <div>
                                    <h3 class="text-danger">Últimas Bodas Creadas.</h3> 
                                    @foreach ($bodas as $boda)
                                        <h5><span class="text-info">Boda: </span>@if ($boda->nomBoda == null)"Sin registros en la base de datos"@endif{{$boda->nomBoda}}, <span class="text-info">Fecha celebración: </span>@if ($boda->fechaBoda == null)"Sin registros en la base de datos"@endif{{$boda->fechaBoda}}, <span class="text-info">Creado </span>@if ($boda->created_at == null)"Sin registros en la base de datos"@endif{{\Carbon\Carbon::parse($boda->created_at)->diffForHumans()}}</h5>
                                    @endforeach                  
                                </div>
                                <br>
                                <div>
                                    <h3 class="text-danger">Últimos Presupuestos Creados.</h3>
                                    @foreach ($presupuestos as $presupuesto)
                                        <h5><span class="text-info">Presupuesto: </span>@if ($presupuesto->nomPresupuesto == null)"Sin registros en la base de datos"@endif{{$presupuesto->nomPresupuesto}}, <span class="text-info">Precio Total: </span>@if ($presupuesto->precioTotal == null)"Sin registros en la base de datos"@endif{{$presupuesto->precioTotal}} €, <span class="text-info">Creado </span>@if ($presupuesto->created_at == null)"Sin registros en la base de datos"@endif{{\Carbon\Carbon::parse($presupuesto->created_at)->diffForHumans()}}</h5>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
                     
            </div>

    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">    
    
@stop

@section('js')
    <script></script>
@stop