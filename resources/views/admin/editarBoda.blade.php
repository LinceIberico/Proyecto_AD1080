@extends('adminlte::page')

@section('title', 'AD1080')
<link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
        <link href="{{asset('css/all.css')}}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
        <script src="{{ asset('js/formulario_Admin_EditarBoda.js') }}" defer></script>

        @livewireStyles
@section('content_header')
    <div class="rounded text-center  bg-info py-3">
        <h1>Editar Boda</h1>
    </div>
@stop

@section('content')
<div class="steps" id="stepsDemo">
  <div class="card">
    <div class="card-body">    
    <form id="formulario_EditarBoda" class="formulario_EditarBoda" action="{{route('bodas.update',$boda)}}" method="POST">
        @csrf  
        @method('put')     

        <div class="lg:w-3/4 sm:w-auto mx-auto">         
          <div class="step-content has-text-centered is-active">
            <div class="field is-horizontal">
              <div class="field-label is-normal ">
                <label class="label ">Boda</label>
              </div>
                 <div class="field-body">
                    <div class="field">
                      <div class="control px-12 py-1">
                        <input class="input is-rounded" name="nomBoda" id="nomBoda" type="text" value="{{$boda->nomBoda}}" autofocus data-validate="require">
                      </div>
                    </div>
                 </div>
            </div>         
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Fecha de la Boda</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="date" name="fechaBoda" id="fechaBoda" value="{{$boda->fechaBoda}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
            
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Hora de la Ceremonia</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1">
                      <input class="input is-rounded" name="horaBoda" id="horaBoda" type="time" value="{{$boda->horaBoda}}" autofocus data-validate="require">
                    </div>
                  </div>
                </div>
              </div>           
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Nombre del Novio</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="nomNovio" id="nomNovio" value="{{$boda->nomNovio}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Nombre de la Novia</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="nomNovia" id="nomNovia" value="{{$boda->nomNovia}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Direcci??n del Novio</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="dirNovio" id="dirNovio" value="{{$boda->dirNovio}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Direcci??n de la Novia</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="dirNovia" id="dirNovia" value="{{$boda->dirNovia}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Tel??fono Novio</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="tlfNovio" id="tlfNovio" maxlength="9" value="{{$boda->tlfNovio}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Tel??fono Novia</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="tlfNovia" id="tlfNovia"  maxlength="9" value="{{$boda->tlfNovia}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Email Novio</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="email" name="emailNovio" id="emailNovio" value="{{$boda->emailNovio}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>              
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Email Novia</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="email" name="emailNovia" id="emailNovia" value="{{$boda->emailNovia}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Ceremonia</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="ceremonia" id="ceremonia" value="{{$boda->ceremonia}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Celebraci??n</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <input class="input is-rounded" type="text" name="celebracion" id="celebracion" value="{{$boda->celebracion}}" data-validate="require">
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Descripci??n</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <textarea class="textarea is-rounded" type="text" name="descripcion" id="descripcion" data-validate="require">{{$boda->descripcion}}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            
                          
                          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                            <button class="button btn-success is-rounded mb-1" type="submit" id="btnEditarBoda" name="btnEditarBoda">
                              <span class="icon is-small">
                                <i class="fas fa-check"></i>
                              </span>
                              <span>Guardar</span>
                            </button>
                            
                            <button class="button  is-rounded btn-warning" type="button" onclick="window.location='{{ route('bodas.show',$boda->id) }}'" id="btnResetFormulario" name="btnResetFormulario">
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