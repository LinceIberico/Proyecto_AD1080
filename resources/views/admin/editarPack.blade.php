@extends('adminlte::page')

@section('title', 'AD1080')
<link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
        <link href="{{asset('css/all.css')}}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
        <script src="{{ asset('js/formulario_EditarPack.js') }}" defer></script>
        <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
        <script src="{{ asset('js/formulario_NuevoPack.js') }}" defer></script>

        @livewireStyles
@section('content_header')
    <div class="rounded text-center  bg-info py-3">
        <h1>Editar Promoción</h1>
    </div>
@stop

@section('content')
<div class="steps" id="stepsDemo">
  <div class="card">
    <div class="card-body">    
    <form id="formulario_EditarPack" class="formulario_EditarPack" action="{{route('packs.update',$pack)}}" method="POST">
        @csrf  
        @method('put')        

        <div class="lg:w-3/4 sm:w-auto mx-auto">         
          <div class="step-content has-text-centered is-active">
            <div class="field is-horizontal">
              <div class="field-label is-normal ">
                <label class="label ">Pack</label>
              </div>
                 <div class="field-body">
                    <div class="field">
                      <div class="control px-12 py-1">
                        <input class="input is-rounded" name="nomPack" id="nomPack" type="text" value="{{$pack->nomPack}}" autofocus data-validate="require">
                      </div>
                    </div>
                 </div>
            </div>         
                          <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">Precio</label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <div class="control px-12 py-1 has-icon has-icon-right">
                                  <input class="input is-rounded" type="number" name="precioPack" id="precioPack" Step=".01" value="{{$pack->precioPack}}" data-validate="require">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">Descripción</label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <div class="control px-12 py-1 has-icon has-icon-right">
                                  <textarea class="textarea" type="number" name="descripcion" id="descripcion"  data-validate="require">{{$pack->descripcion}}</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          @if ($pack->vigente == "SI")

                          <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">Vigente</label>
                            </div>
                            <div class="field-body">
                              <div class="control">
                                <div class="control px-12 py-1 has-icon has-icon-right">
                                  <input class="radio" type="radio" name="vigente" id="vigente" checked value="SI"> SI        
                                </div>
                              </div>
                              <div class="control">
                                <div class="control px-12 py-1 has-icon has-icon-right">
                                  <input class="radio" type="radio" name="vigente" id="vigente" value="NO"> NO
                                </div>
                              </div>
                            </div>
                          </div>
                            @else  

                          <div class="field is-horizontal">
                              <div class="field-label is-normal">
                                <label class="label">Vigente</label>
                              </div>
                              <div class="field-body">
                                <div class="control">
                                  <div class="control px-12 py-1 has-icon has-icon-right">
                                    <input class="radio" type="radio" name="vigente" id="vigente" value="SI"> SI                                      
                                  </div>
                                </div>
                                <div class="control">
                                  <div class="control px-12 py-1 has-icon has-icon-right">
                                    <input class="radio" type="radio" name="vigente" id="vigente" checked value="NO"> NO
                                  </div>
                                </div>
                              </div>
                          </div> 

                          @endif
                          
                          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                            <button class="button btn-success is-rounded mb-1" type="submit" data-toggle="modal" data-target="#myModal" id="btnEditarPack" name="btnEditarPack">
                              <span class="icon is-small">
                                <i class="fas fa-check"></i>
                              </span>
                              <span>Guardar</span>
                            </button>
                            
                            <button class="button  is-rounded btn-warning" type="button" onclick="window.location='{{ route('packs.index') }}'" id="btnResetFormulario" name="btnResetFormulario">
                              <span class="icon is-small">
                                <i class="fas fa-times"></i>
                              </span>
                              <span>Volver</span>
                            </button>
                          </form>
                          
                          <form id="formulario_EliminarPack" class="formulario_EliminarPack" action="{{route('packs.destroy',$pack)}}" method="GET">
                            @csrf
                            @method('GET')
                          <button class="button btn-danger is-rounded mb-1" type="submit" data-toggle="modal" data-target="#myModal" id="btnEliminarPack" name="btnEliminarPack">
                            <span class="icon is-small">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span>Eliminar</span>
                          </button>
                          </form>
                          
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