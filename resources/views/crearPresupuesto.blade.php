<x-app-layout>

  @Push('head')

<!-- Scripts -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
<script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
<script src="{{ asset('js/formulario_Presupuesto.js') }}"defer></script>
@endpush

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Crea tu Presupuesto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg"> 
       
              <div class="steps" id="stepsDemo">              
                {{-- FORMULARIO PRESUPUESTO --}}
                <form id="formulario_nuevoPresupuesto" class="formulario_presupuesto" action="{{route('crearPresupuesto')}}" method="POST">
                  @csrf
                  <h2 class="text-3xl text-center py-3">Presupuesto</h2>
                  {{-- <h2 class="text-sm text-center py-3">Los campos con asterisco son obligatorios</h2> --}}
                  <div class="steps-content"> 

                    <div class="step-content has-text-centered">
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          {{-- <label class="label">Presupuesto</label> --}}
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1">
                              @foreach ($boda as $key)
                              <input class="input is-rounded" name="nomPresupuesto" id="nomPresupuesto" type="hidden" value="Presupuesto de {{$key->nomBoda}}"  data-validate="require">                                  
                              @endforeach
                            </div>
                          </div>
                        </div>
                      </div>
                  
                    @foreach ($boda as $key)    
                    <input class="input is-rounded" type="hidden" name="idBodaPresupuesto" id="idBodaPresupuesto" value="{{$key->id}}" data-validate="require">    
                    @endforeach
                    
                    <input class="input is-rounded" type="hidden" name="fechaPresupuesto" id="fechaPresupuesto"  data-validate="require">
                  
                    <div class="step-content has-text-centered">
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">Paquete de Fotografía</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1">
                              <select class="input is-rounded" name="comboPackPresupuesto" id="comboPackPresupuesto"> 
                                @foreach ($paquetes as $paquete)
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
                              <select multiple class="select is-multiple is-rounded w-full" name="comboExtraPresupuesto[]" id="comboExtraPresupuesto">                                                            
                                @foreach ($extras as $extra)                                  
                                    <option @if ($extra['id'] == 1)
                                    selected
                                    @endif
                                     title="{{$extra['descripcion']}}" data-precio="{{$extra['precioExtra']}}" value="{{$extra['id']}}">{{$extra['nomExtra']}} - {{$extra['precioExtra']}} €</option>
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
                              <input class="input is-rounded is-success" type="text" name="precioTotal" id="precioTotal" value="0.00" Step=".01" readonly>
                              <span class="icon is-small is-right">
                                <i class="fas fa-euro-sign"></i>
                              </span>
                            </p>
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
                              <textarea class="textarea" type="text" name="observaciones" id="observaciones" data-validate="require"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                        {{-- <button class="button is-success is-rounded mb-1" type="submit" id="btnGuardarPresupuesto" name="btnGuardarPresupuesto">
                          <span class="icon is-small">
                            <i class="fas fa-check"></i>
                          </span>
                          <span>Guardar Presupuesto</span>
                        </button> --}}
                        <x-jet-button id="btnGuardarPresupuesto" name="btnGuardarPresupuesto" type="submit"  class="bg-green-500 hover:bg-green-800 px-2 py-2">
                          <span class="icon is-small">
                            <i class="fas fa-check"></i>
                          </span>
                          <span>Guardar</span>
                        </x-jet-button>
                        
                        <x-jet-button id="btnResetFormulario" name="btnResetFormulario" type="reset"  class="bg-red-500 hover:bg-red-800 px-2 py-2">
                          <span class="icon is-small">
                            <i class="fas fa-times"></i>
                          </span>
                          <span>Borrar Formulario</span>
                        </x-jet-button>
                        {{-- <button class="button is-danger is-rounded " type="reset" id="btnResetFormulario" name="btnResetFormulario">
                          <span class="icon is-small">
                            <i class="fas fa-times"></i>
                          </span>
                          <span>Borrar Formulario</span>
                        </button> --}}
                      </div>
                    </div>
                     
                    </div>
                  </div>

                </form>

              </div>
             
            </div>
        </div>
    </div>
</x-app-layout>
