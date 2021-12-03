@extends('adminlte::page')

@section('title', 'AD1080')
  <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
  <link href="{{asset('css/all.css')}}" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
  <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
  <script src="{{ asset('js/formulario_NuevoExtra.js') }}" defer></script>
               
@livewireStyles
 @section('content_header')
    <div class="rounded text-center  bg-info py-3">
      <h1>Nuevo Extra</h1>
    </div>
@stop
               
@section('content')
  <div class="steps" id="stepsDemo">
               <div class="card">
                 <div class="card-body">

                
   <form id="formulario_NuevoExtra" class="formulario_NuevoExtra" action="{{route('extras.store')}}" method="POST">
      @csrf       
        
        <div class="lg:w-3/4 sm:w-auto mx-auto">         
          <div class="step-content has-text-centered is-active">
            <div class="field is-horizontal">
                <div class="field-label is-normal ">
                    <label class="label ">Extra</label>
                </div>
                <div class="field-body">
                   <div class="field">
                      <div class="control px-12 py-1">
                        <input class="input is-rounded" name="nomExtra" id="nomExtra" type="text" autofocus data-validate="require">
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
                      <input class="input is-rounded" type="number" name="precioExtra" id="precioExtra" Step=".01" data-validate="require">
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
                        <textarea class="textarea" type="number" name="descripcion" id="descripcion"  data-validate="require"></textarea>
                    </div>
                  </div>
                </div>
            </div>
                          
            <div class="field is-horizontal">
              <div class="field-label is-normal">
                <label class="label">Vigente</label>
              </div>
                <div class="field-body">
                  <div class="control">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="radio" type="radio" name="vigente" id="vigente" value="SI" checked> SI
                    </div>
                  </div>
                  <div class="control">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="radio" type="radio" name="vigente" id="vigente" value="NO"> NO
                    </div>
                  </div>
                </div>
            </div>
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
              <button class="button btn-success is-rounded mb-1" type="submit" data-toggle="modal" data-target="#myModal" id="btnNuevoExtra" name="btnNuevoExtra">
                <span class="icon is-small">
                  <i class="fas fa-check"></i>
                </span>
                <span>Guardar</span>
              </button>
              
              <button class="button btn-warning is-rounded " type="button" onclick="window.location='{{ route('extras.index') }}'" id="btnResetFormulario" name="btnResetFormulario">
                <span class="icon is-small">
                  <i class="fas fa-times"></i>
                </span>
                <span>Volver</span>
              </button>
            </div>
          </div>
          
        </div>
      </div>
      
    </form>
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