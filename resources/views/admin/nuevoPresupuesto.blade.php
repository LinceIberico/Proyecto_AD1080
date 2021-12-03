@extends('adminlte::page')

@section('title', 'AD1080')
<link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS -->
        <link href="{{asset('css/all.css')}}" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link href="{{asset('css/mis_estilos.css')}}" rel="stylesheet">      
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
        <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
        <script src="{{ asset('js/formulario_Admin_NuevoPresupuesto.js') }}"defer></script>

        @livewireStyles
@section('content_header')
    <div class="rounded text-center  bg-info py-3">
        <h1>Nuevo Presupuesto</h1>
    </div>
@stop

@section('content')
<div class="steps" id="stepsDemo">
  <div class="card">
    <div class="card-body">    
    <form id="formulario_NuevoPresupuesto" class="formulario_NuevoPresupuesto" action="{{route('presupuestos.store')}}" method="POST">
        @csrf    

        <div class="lg:w-3/4 sm:w-auto mx-auto">         
          <div class="step-content has-text-centered is-active">
            <div class="field is-horizontal">
              <div class="field-label is-normal ">
                <label class="label ">Presupuesto</label>
              </div>
                 <div class="field-body">
                    <div class="field">
                      <div class="control px-12 py-1">
                        <input class="input is-rounded" name="nomPresupuesto" id="nomPresupuesto" type="text" placeholder="Presupuesto Cristina & Alfonso" autofocus data-validate="require">
                      </div>
                    </div>
                 </div>
            </div>

            <input class="input is-rounded" type="hidden" name="fechaPresupuesto" id="fechaPresupuesto"  data-validate="require">
        
            {{-- <form id="formulario_buscarBoda" name="formulario_buscarBoda" method="POST"> --}}
            {{-- <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Bodas desde:</label>
                </div>
                <div class="field-body">
                  <div class="field">
                  <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1">
                        <input class="form-control" type="date" id="fechaFomBuscarBoda" name="fechaFinBuscarBoda">
                    </div>                    
                  </div>
                </div>
              </div>
            <div class="m-1 col-12"> --}}
                {{-- <input class="btn btn-primary" type="button" id="btnBuscarBodaPresupuesto" name="btnBuscarBodaPresupuesto" value="Buscar"> --}}
                {{-- <input class="button btn-info is-rounded mb-1" type="button" id="btnBuscarBodaPresupuesto" name="btnBuscarBodaPresupuesto" value="Buscar"> --}}
                  
                {{-- <input class="btn btn-primary" type="button" id="btnMostrarTodasBodas" name="btnMostrarTodasBodas" value="Mostrar Todos"> --}}     
                    {{-- <input class="button btn-info is-rounded mb-1" type="button" id="btnMostrarTodasBodas" name="btnMostrarTodasBodas" value="Mostrar Todas"> --}}

                  
            {{-- </div>
                       <div class="control px-12 py-1">
                        <input class="form-control" type="date" id="fechaInicioBuscarBoda" name="fechaInicioBuscarBoda">
                    </div>                    
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Bodas hasta:</label>
                </div> --}}
       
          {{-- </form> --}}

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Seleccione Boda</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1">
                      <select class="input is-rounded" name="comboBodaPresupuesto" id="comboBodaPresupuesto" required> 
                        @foreach ($bodas as $boda)
                                <option data-nombre="{{$boda->nomBoda}}" data-fecha="{{$boda->fechaBoda}}" value="{{$boda->id}}">{{$boda->fechaBoda}} - {{$boda->nomBoda}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
            </div>

                <div class="field is-horizontal">
                    <div class="field-label is-normal">
                        <label class="label">Pagado</label>
                    </div>
                    <div class="field-body">
                    <div class="control">
                        <div class="control px-12 py-1 has-icon has-icon-right">
                            <input class="radio" type="radio" name="pagado" id="pagado" value="SI"> SI                                      
                        </div>
                    </div>
                    <div class="control">
                        <div class="control px-12 py-1 has-icon has-icon-right">
                            <input class="radio" type="radio" name="pagado" id="pagado" value="NO" checked> NO
                        </div>
                    </div>
                    </div>
                </div> 
             
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Observaciones</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <textarea class="textarea is-rounded" type="text" name="observaciones" id="observaciones" data-validate="require"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Paquete de Fotografía</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1">
                      <select class="input is-rounded" name="comboPackPresupuesto" id="comboPackPresupuesto" required> 
                        @foreach ($packs as $paquete)
                                <option data-precio="{{$paquete['precioPack']}}" value="{{$paquete['id']}}">{{$paquete['nomPack']}} - {{$paquete['precioPack']}} €</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>                   
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Seleccionar Extras</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <select multiple required class="select is-multiple is-rounded w-full" name="comboExtraPresupuesto[]" id="comboExtraPresupuesto">                                                            
                        @foreach ($extras as $extra)
                         
                          <option title="{{$extra['descripcion']}}" data-precio="{{$extra['precioExtra']}}" value="{{$extra['id']}}">{{$extra['nomExtra']}} - {{$extra['precioExtra']}} €</option>

                        @endforeach                        

                      </select>

                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Seleccionar Descuento</label>
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control px-12 py-1 has-icon has-icon-right">
                      <select class="input is-rounded" name="comboPromocionPresupuesto" id="comboPromocionPresupuesto" >                                  
                        @foreach ($promociones as $promocion)
                            <option tittle="{{$promocion['descripcion']}}" data-precio="{{$promocion['descuento']}}" value="{{$promocion['id']}}">{{$promocion['nomPromo']}} - {{$promocion['descuento']}}%</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                  <label class="label">Precio Total:</label>
                </div>
                <div class="field-body">
                  <div class="field">

                    <div class="control px-12 py-1">
                    <p class="control has-icons-right">
                      <input class="input is-rounded" type="text" name="precioTotal" id="precioTotal" Step=".01" value="0.00" readonly>
                      <span class="icon is-small is-right">
                        <i class="fas fa-euro-sign"></i>
                      </span>
                    </p>
                    </div>
                  </div>
                </div>
              </div>
            
                          
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                <button class="button btn-success is-rounded mb-1" type="submit" data-toggle="modal" data-target="#myModal" id="btnNuevoPresupuesto" name="btnNuevoPresupuesto">
                    <span class="icon is-small">
                    <i class="fas fa-check"></i>
                    </span>
                    <span>Guardar</span>
                </button>
                            
                <button class="button  is-rounded btn-warning" type="button" onclick="window.location='{{route('presupuestos.index')}}'" id="btnResetFormulario" name="btnResetFormulario">
                    <span class="icon is-small">
                    <i class="fas fa-times"></i>
                    </span>
                    <span>Volver</span>
                </button>
                </div>
          </div>
                        
        </div>
    </form>
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