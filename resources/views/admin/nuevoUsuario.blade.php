@extends('adminlte::page')

@section('title', 'AD1080')
<link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
        <link href="{{asset('css/all.css')}}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
        {{-- <script src="{{ asset('js/SweetAlert2.js') }}" defer></script> --}}
        <script src="{{ asset('js/formulario_NuevoUsuario.js') }}" defer></script>

        @livewireStyles
@section('content_header')
    <div class="rounded text-center  bg-info py-3">
        <h1>Nuevo Usuario</h1>
    </div>
@stop

@section('content')
<div class="steps" id="stepsDemo">

     <form id="formulario_nuevoUsuario" class="formulario_nuevoUsuario" action="{{route('admin.nuevoUsuario.store')}}" method="POST">
       @csrf       
       {{-- <h2 class="text-sm text-center py-3">Los campos con asterisco son obligatorios</h2> --}}
       <div class="lg:w-3/4 sm:w-auto mx-auto">         
         <div class="step-content has-text-centered is-active">
           <div class="field is-horizontal">
             <div class="field-label is-normal ">
               <label class="label ">Usuario</label>
             </div>
             <div class="field-body">
               <div class="field">
                 <div class="control px-12 py-1">
                   <input class="input is-rounded" name="name" id="name" type="text" placeholder="Nombre Apellido Apellido" autofocus data-validate="require">
                 </div>
               </div>
             </div>
           </div>
           <div class="field is-horizontal">
            <div class="field-label is-normal ">
              <label class="label ">Contraseña</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control px-12 py-1">
                  <input class="input is-rounded" name="password1" id="password1" type="password" autofocus data-validate="require">
                </div>
              </div>
            </div>
          </div>
          <div class="field is-horizontal">
            <div class="field-label is-normal ">
              <label class="label ">Verificar Contraseña</label>
            </div>
            <div class="field-body">
              <div class="field">
                <div class="control px-12 py-1">
                  <input class="input is-rounded" name="password" id="password" type="password" autofocus data-validate="require">
                </div>
              </div>
            </div>
          </div>         
           <div class="field is-horizontal">
             <div class="field-label is-normal">
               <label class="label">Email</label>
             </div>
             <div class="field-body">
               <div class="field">
                 <div class="control px-12 py-1 has-icon has-icon-right">
                   <input class="input is-rounded" type="email" name="email" id="email" data-validate="require">
                 </div>
               </div>
             </div>
           </div>
           <div class="field is-horizontal">
            <div class="field-label is-normal">
              <label class="label">Categoría</label>
            </div>
            <div class="field-body">
              <div class="sm:w-80">
                <div class="control px-12 py-1">
                    <select class="input is-rounded" name="comboPackCategoria" id="comboPackCategoria"> 
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria['id']}}">{{$categoria['categoria']}}</option>
                        @endforeach
                    </select>
                </div>
              </div>
            </div>
          </div>                   
           
           <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
             <button class="button btn-success is-rounded mb-1" type="submit" data-toggle="modal" data-target="#myModal" id="btnGuardarNuevoUsurario" name="btnGuardarNuevoUsurario">
               <span class="icon is-small">
                 <i class="fas fa-check"></i>
               </span>
               <span>Guardar</span>
             </button>
             
             <button class="button btn-danger is-rounded " type="reset" id="btnResetFormulario" name="btnResetFormulario">
               <span class="icon is-small">
                 <i class="fas fa-times"></i>
               </span>
               <span>Borrar Formulario</span>
             </button>
           </div>
         </div>
          
         </div>
       </div>

     </form>

    <div id="modal-errores"></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
     
    </script>
@stop