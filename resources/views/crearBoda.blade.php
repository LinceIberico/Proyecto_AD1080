<x-app-layout>

  @Push('head')

  <!-- Scripts -->
  <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
  <script src="{{ asset('js/formulario_Boda.js') }}" defer></script>
  
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>
  <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
  {{-- <script src="{{ asset('js/formulario_Boda.js') }}" defer></script> --}}

  @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-100 leading-tight">
            {{ __('Crea tu Boda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-gray-100   overflow-hidden shadow-xl sm:rounded-lg"> 
       
              <div class="steps" id="stepsDemo">
               {{-- FORMULARIO BODA --}}
                <form id="formulario_nuevaBoda" class="formulario_boda" action="{{route('crearBoda')}}" method="POST">
                  @csrf
                  <h2 class="text-3xl text-center py-3">Datos de la Boda</h2>

                  <div class="steps-content">
                    <input type="hidden" name="idUsuarioFK" id="idUsuarioFK" value="{{$users}}">
                    <div class="step-content has-text-centered is-active">
                      <div class="field is-horizontal">
                        <div class="field-label is-normal ">
                          <label class="label ">Nombre de la Boda</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1">
                              <input class="input is-rounded" name="nomBoda" id="nomBoda" type="text" placeholder="ej María y Eduardo" autofocus data-validate="require">
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
                              <input class="input is-rounded" type="date" name="fechaBoda" id="fechaBoda"  data-validate="require">
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
                              <input class="input is-rounded" name="horaBoda" id="horaBoda" type="time" placeholder="" autofocus data-validate="require">
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
                              <input class="input is-rounded" type="text" name="nomNovio" id="nomNovio" placeholder="Nombre Apellido Apellido" data-validate="require">
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
                              <input class="input is-rounded" type="text" name="nomNovia" id="nomNovia" placeholder="Nombre Apellido Apellido" data-validate="require">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">Dirección del Novio</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1 has-icon has-icon-right">
                              <input class="input is-rounded" type="text" name="dirNovio" id="dirNovio" placeholder="" data-validate="require">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">Dirección de la Novia</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1 has-icon has-icon-right">
                              <input class="input is-rounded" type="text" name="dirNovia" id="dirNovia" placeholder="" data-validate="require">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">Teléfono Novio</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1 has-icon has-icon-right">
                              <input class="input is-rounded" type="text" name="tlfNovio" id="tlfNovio" placeholder="658123246"  maxlength="9" data-validate="require">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">Teléfono Novia</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1 has-icon has-icon-right">
                              <input class="input is-rounded" type="text" name="tlfNovia" id="tlfNovia" placeholder="658123246"  maxlength="9" data-validate="require">
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
                              <input class="input is-rounded" type="email" name="emailNovio" id="emailNovio" placeholder="" data-validate="require">
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
                              <input class="input is-rounded" type="email" name="emailNovia" id="emailNovia" placeholder="" data-validate="require">
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
                              <input class="input is-rounded" type="text" name="ceremonia" id="ceremonia" placeholder="lugar dónde se celebrará la unión" data-validate="require">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="field is-horizontal">
                        <div class="field-label is-normal">
                          <label class="label">Celebración</label>
                        </div>
                        <div class="field-body">
                          <div class="field">
                            <div class="control px-12 py-1 has-icon has-icon-right">
                              <input class="input is-rounded" type="text" name="celebracion" id="celebracion" placeholder="lugar dónde se realizará la celebración" data-validate="require">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                        {{-- <button class="button is-success is-rounded mb-1" type="submit" data-toggle="modal" data-target="#myModal" id="btnGuardarBoda" name="btnGuardarBoda">
                          <span class="icon is-small">
                            <i class="fas fa-check"></i>
                          </span>
                          <span>Guardar</span>
                        </button> --}}
                        <x-jet-button id="btnGuardarBoda" name="btnGuardarBoda" type="submit"  class="bg-green-500 hover:bg-green-800 px-2 py-2">
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
                

                <div id="modal-errores"></div>
              </div>
             
            </div>
          </div>
        </div>

</x-app-layout>
