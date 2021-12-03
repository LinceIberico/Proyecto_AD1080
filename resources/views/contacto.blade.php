<x-app-layout>

    @Push('head')
  
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/formulario_Contacto.js') }}" defer></script>
    
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
  
    @endpush
      <x-slot name="header">
          <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
              {{ __('Contacto') }}
          </h2>
      </x-slot>
  
      <div class="py-12">
          <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
              <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg"> 
         
                <div class="steps" id="stepsDemo">

                  <form id="formulario_contacto" class="formulario_boda" action="{{route('contacto.enviarEmailContacto')}}" method="POST">
                    @csrf

                    <h2 class="text-3xl text-center py-3">Contáctanos</h2>
  
                    <div class="steps-content">
                      <input type="hidden" name="email" id="email" value="{{$emailUsuario}}">
                      <div class="step-content has-text-centered is-active">
                        <div class="field is-horizontal">
                          <div class="field-label is-normal ">
                            <label class="label ">Nombre</label>
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control px-12 py-1">
                                <input class="input is-rounded" name="nombreContacto" id="nombreContacto" type="text" autofocus data-validate="require">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="field is-horizontal">
                          <div class="field-label is-normal">
                            <label class="label">Fecha para boda</label>
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control px-12 py-1 has-icon has-icon-right">
                                <input class="input is-rounded" type="date" name="fechaContacto" id="fechaContacto"  data-validate="require">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="step-content has-text-centered">
                        <div class="field is-horizontal">
                          <div class="field-label is-normal">
                            <label class="label">Hora de la Ceremonia</label>
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control px-12 py-1">
                                <input class="input is-rounded" name="horaContacto" id="horaContacto" type="time" autofocus data-validate="require">
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="field is-horizontal">
                          <div class="field-label is-normal">
                            <label class="label">Teléfono de Contacto</label>
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control px-12 py-1 has-icon has-icon-right">
                                <input class="input is-rounded" type="text" name="tlfContacto" id="tlfContacto" placeholder="658123246"  maxlength="9" data-validate="require">
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="field is-horizontal">
                          <div class="field-label is-normal">
                            <label class="label">Email de Contacto</label>
                          </div>
                          <div class="field-body">
                            <div class="field">
                              <div class="control px-12 py-1 has-icon has-icon-right">
                                <input class="input is-rounded" type="email" name="emailContacto" id="emailContacto" data-validate="require">
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
                                <input class="input is-rounded" type="text" name="ceremoniaContacto" id="ceremoniaContacto" data-validate="require">
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">Mensaje</label>
                            </div>
                            <div class="field-body">
                              <div class="field">
                                <div class="control px-12 py-1 has-icon has-icon-right">
                                  <textarea class="textarea" type="text" name="mensajeContacto" id="mensajeContacto" data-validate="require"></textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">

                          <x-jet-button id="btnEnviarContacto" name="btnEnviarContacto" type="submit"  class="bg-green-500 hover:bg-green-800 px-2 py-2">
                            <span class="icon is-small">
                              <i class="fas fa-check"></i>
                            </span>
                            <span>Enviar</span>
                          </x-jet-button>
                          <x-jet-button id="btnResetFormulario" name="btnResetFormulario" type="reset"  class="bg-red-500 hover:bg-red-800 px-2 py-2">
                            <span class="icon is-small">
                              <i class="fas fa-times"></i>
                            </span>
                            <span>Borrar Formulario</span>
                          </x-jet-button>

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
  