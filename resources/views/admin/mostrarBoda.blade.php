@extends('adminlte::page')

@section('title', 'AD1080')
  <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
  <link href="{{asset('css/all.css')}}" rel="stylesheet">
  <link href="{{asset('css/mis_estilos.css')}}" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

               
@livewireStyles
 @section('content_header')
    <div class="rounded text-center  bg-info py-3">
      <h1>Boda de {{$boda->nomBoda}} - Fecha: {{$boda->fechaBoda}}</h1>
    </div>
@stop
               
@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
        <div class="card">
            <div class="card-body">            
            <form id="formulario_mostrarBoda" class="formulario_mostrarBoda" action="{{route('bodas.edit',$boda->id)}}" method="POST">
        @csrf  
        {{-- <div class="centrar-logo">
            <img src="{{asset('img/logo_150.png')}}" alt="logo">
        </div> --}}
            <div id="datos_boda">
                <h2 id="nomBoda" class="font-size-h2">Boda de {{$boda->nomBoda}}</h2>
                <h3 class="font-size-h3">Datos Generales</h3>
                <p id="fechaBoda" class="font-size-p"><span class="text-resalto">Fecha:</span> {{$boda->fechaBoda}} a las {{$boda->horaBoda}} horas.</p>
                <p class="font-size-p"><span class="text-resalto">Ceremonia en:</span> {{$boda->ceremonia}}</p>
                <p class="font-size-p"><span class="text-resalto">Celebración:</span> {{$boda->celebracion}}</p>
                <p class="font-size-p"><span class="text-resalto">A tener en cuenta:</span>
                    @if ($boda->descripcion == "")
                    "No se añadieron datos"
                    @endif    
                    {{$boda->descripcion}}
                </p>
                <h3 class="font-size-h3">Datos del novio</h3>
                <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$boda->nomNovio}}</p>
                <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$boda->tlfNovio}}</p>
                <p class="font-size-p"><span class="text-resalto">Dirección:</span> {{$boda->dirNovio}}</p>
                <p class="font-size-p"><span class="text-resalto">Email:</span> {{$boda->emailNovio}}</p>
                <h3 class="font-size-h3">Datos de la novia</h3>
                <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$boda->nomNovia}}</p>
                <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$boda->tlfNovia}}</p>
                <p class="font-size-p"><span class="text-resalto">Dirección:</span> {{$boda->dirNovia}}</p>
                <p class="font-size-p"><span class="text-resalto">Email:</span> {{$boda->emailNovia}}</p>
            </div>
        </form>
            <div class="lg:w-3/4 sm:w-auto mx-auto">         
                <div class="step-content has-text-centered is-active">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                        <button class="button btn-danger is-rounded mb-1" onclick="window.location='{{ route('bodas.obtenerPDF',$boda->id) }}'" id="btnPdfBoda" name="btnPdfBoda">
                            <span class="icon is-small">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            <span>PDF</span>
                        </button>

                        <button class="button btn-info is-rounded mb-1" type="button" onclick="window.location='{{ route('bodas.edit',$boda->id) }}'" id="btnEditarBoda" name="btnEditarBoda">
                            <span class="icon is-small">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span>Editar</span>
                        </button>
                        
                        <button class="button btn-warning is-rounded " type="button" onclick="window.location='{{ route('bodas.index') }}'" id="btnResetFormulario" name="btnResetFormulario">
                            <span class="icon is-small">
                                <i class="fas fa-times"></i>
                            </span>
                            <span>Volver</span>
                        </button>
                    </div>
                </div>                
            </div>
            </div>
        </div>
    
</div>

     <div id="modal-errores"></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>

    </script>
@stop