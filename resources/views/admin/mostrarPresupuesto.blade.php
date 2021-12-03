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
      <h1>{{$presupuesto->nomPresupuesto}} - Fecha: {{$presupuesto->fechaPresupuesto}}</h1>
    </div>
@stop
               
@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    
        <div class="card">
            <div class="card-body">            
            <form id="formulario_mostrarPresupuesto" class="formulario_mostrarPresupuesto" action="route('presupuestos.edit',$presupuesto->id)" method="POST">
        @csrf  
            
            <div>
                <h2 id="nomPresupuesto" class="font-size-h2">{{$presupuesto->nomPresupuesto}}</h2>
                <h3 class="font-size-h3">Datos Generales</h3>
                <p class="font-size-p"><span class="text-resalto">Fecha Creacion: </span>{{$presupuesto->fechaPresupuesto}}</p>
                <p class="font-size-p"><span class="text-resalto">Última Actualización: </span>{{$presupuesto->updated_at}}</p>
                <p class="font-size-p"><span class="text-resalto">Precio Total: </span>{{$presupuesto->precioTotal}} €</p>
                <p class="font-size-p"><span class="text-resalto">Observaciones: </span>
                    @if ($presupuesto->observaciones == "")
                        "No se añadieron observaciones"
                    @endif{{$presupuesto->observaciones}} 
                </p>
                <p class="font-size-p"><span class="text-resalto">¿Está pagado? </span>{{$presupuesto->pagado}} </p>
                <h3 class="font-size-h3">Datos de la boda</h3>
                <p class="font-size-p"><span class="text-resalto">Día de la boda: </span>{{$boda->fechaBoda}} , a las {{$boda->horaBoda}}</p>
                <p class="font-size-p"><span class="text-resalto">Nombre de la boda: </span>{{$boda->nomBoda}} </p>
                <p class="font-size-p"><span class="text-resalto">Nombre de la novia: </span>{{$boda->nomNovia}}<br><span class="text-resalto">Tlf: </span>{{$boda->tlfNovia}}<br><span class="text-resalto">Email:</span> {{$boda->emailNovia}} <br><br>
                    <span class="text-resalto">Nombre del novio: </span>{{$boda->nomNovio}}<br><span class="text-resalto">Tlf: </span>{{$boda->tlfNovio}}<br><span class="text-resalto">Email:</span> {{$boda->emailNovio}}
                </p>                
                <h3 class="font-size-h3">Packs</h3>
                <p class="font-size-p"><span class="text-resalto">Nombre Pack:</span> {{$pack->nomPack}} <br><span class="text-resalto">Precio: </span> {{$pack->precioPack}} € <br><span class="text-resalto">Descripción:</span> {{$pack->descripcion}}</p>
                
                <h3 class="font-size-h3">Extras</h3>
                @foreach ($extras as $extra)                    
                <p class="font-size-p"><span class="text-resalto">Nombre Extra: </span> {{$extra->nomExtra}} <br><span class="text-resalto">Precio: </span> {{$extra->precioExtra}} € <br><span class="text-resalto">Descripción </span> {{$extra->descripcion}}</p>
                @endforeach

                <h3 class="font-size-h3">Promociones</h3>
                <p class="font-size-p"><span class="text-resalto">Promoción:</span> {{$promo->nomPromo}} <br><span class="text-resalto">Descuento: </span> {{$promo->descuento}} % <br><span class="text-resalto">Descripción:</span> {{$promo->descripcion}}</p>                
            </div>
        </form>
            <div class="lg:w-3/4 sm:w-auto mx-auto">         
                <div class="step-content has-text-centered is-active">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                        <button class="button btn-danger is-rounded mb-1" onclick="window.location='{{route('presupuestos.obtenerPDF',$presupuesto->id)}}'" id="btnPdfPresupuesto" name="btnPdfPresupuesto">
                            <span class="icon is-small">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            <span>PDF</span>
                        </button>

                        <button class="button btn-info is-rounded mb-1" type="button" onclick="window.location='{{route('presupuestos.edit',$presupuesto->id)}}'" id="btnEditarPresupuesto" name="btnEditarPresupuesto">
                            <span class="icon is-small">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span>Editar</span>
                        </button>

                        <button class="button btn-primary is-rounded mb-1" type="button" onclick="window.location='{{ route('bodas.edit',$boda->id) }}'" id="btnEditarBoda" name="btnEditarBoda">
                            <span class="icon is-small">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span>Editar Boda</span>
                        </button>
                        
                        <button class="button btn-warning is-rounded " type="button" onclick="window.location='{{ route('presupuestos.index') }}'" id="btnResetFormulario" name="btnResetFormulario">
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