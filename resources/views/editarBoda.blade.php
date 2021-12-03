<x-app-layout>
    @Push('head')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/formulario_MiBoda.js') }}"defer></script>
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-100  leading-tight">
            {{ __('Datos de mi boda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-100 overflow-hidden shadow-xl sm:rounded-lg">
                           
                    {{-- DATOS BODA --}}
                     <div class="container mx-auto text-center">
                         <div class="section py-2">

                            {{-- @if (count(Illuminate\Support\Facades\DB::select("select idUserFK from bodas where idUserFK = ".Auth::user()->id)) == 0)
                                <p class="text-5xl py-2">Aún no tienes niguna boda registrada.</p>
                                <p class="text-3xl text-center text-red-500 py-2">Por favor cree una nueva boda antes en el apartado <a href="{{route('crearBoda')}}">Boda</a></p>
                            @endif --}}

                            @foreach ($bodas as $boda)
                            <form id="formulario_actualizarBoda" name="formulario_actualizarBoda" class="formulario_boda" action="{{route('actualizarMiBoda',$boda)}}" method="POST">
                                @csrf
                                @method('put')
                                
                                <h2 class="text-3xl text-center py-3">Actualizar Datos</h2>
                                {{-- <h2 class="text-sm text-center py-3">Los campos con asterisco son obligatorios</h2> --}}
                                <div class="steps-content">                                  
                                  <div class="step-content has-text-centered is-active">
                                    
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
                                        <label class="label">Dirección del Novio</label>
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
                                        <label class="label">Dirección de la Novia</label>
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
                                        <label class="label">Teléfono Novio</label>
                                      </div>
                                      <div class="field-body">
                                        <div class="field">
                                          <div class="control px-12 py-1 has-icon has-icon-right">
                                            <input class="input is-rounded" type="text" name="tlfNovio" id="tlfNovio" value="{{$boda->tlfNovio}}"  maxlength="9" data-validate="require">
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
                                            <input class="input is-rounded" type="text" name="tlfNovia" id="tlfNovia" value="{{$boda->tlfNovia}}"  maxlength="9" data-validate="require">
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
                                        <label class="label">Celebración</label>
                                      </div>
                                      <div class="field-body">
                                        <div class="field">
                                          <div class="control px-12 py-1 has-icon has-icon-right">
                                            <input class="input is-rounded" type="text" name="celebracion" id="celebracion" value="{{$boda->celebracion}}" data-validate="require">
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-2">
                                        <div class="py-4">
                                            <x-jet-button id="btnActualizarBoda" name="btnActualizarBoda" type="submit"  class="bg-blue-500 hover:bg-blue-800 px-2 py-2">
                                                Actualizar
                                           </x-jet-button>                                           
                                           <x-jet-button type="button" id="btnAtrasBoda" onclick="window.location='{{ URL::previous() }}'"  class="bg-yellow-500 hover:bg-yellow-600 px-2 py-2">
                                               Atrás
                                          </x-jet-button>
                                           </div>
                                    </div>
                                  </div>
                                   
                                  </div>
                                </div>
              
                              </form>
                              @endforeach
                            
                             {{-- @foreach ($bodas as $boda) --}}

                        {{-- <form id="formulario_EditarBoda" action="" method="POST">
                            @csrf

                             <h3 class="text-3xl">Boda de: {{$boda->nomBoda}}</h3>                                
                                                         
                         </div>
                         <div class="mx-auto text-center lg:w-2/4 sm:w-2/4">
                            <div class="mx-auto text-left py-2">
                            <h3 class="text-2xl py-2">Datos Generales</h3>
                             <p><span class="text-red-800">Fecha: </span>{{$boda->fechaBoda}}</p>
                             <p><span class="text-red-800">Hora de la Celebración: </span>{{$boda->horaBoda}}</p>
                             <p><span class="text-red-800">Ceremonia: </span>{{$boda->ceremonia}}</p>
                             <p><span class="text-red-800">Celebración: </span>{{$boda->celebracion}}</p>
                             <br>
                             <p><span class="text-red-800">Última modificación realizada: </span>{{\Carbon\Carbon::parse($boda->updated_at)->diffForHumans()}} el día {{$boda->updated_at}}</p>
                            </div>
                            <div class="mx-auto text-left py-2">
                             <h3 class="text-2xl py-2">Datos del Novio</h3>
                            Nombre Novia <input class="input is-rounded" name="nomBoda" id="nomBoda" type="text" value="{{$boda->nomNovio}}" autofocus data-validate="require">
                             {{-- <p><span class="text-red-800">Nombre: </span>{{$boda->nomNovio}}</p> --}}
                             {{-- <p><span class="text-red-800">Dirección: </span>{{$boda->dirNovio}}</p>
                             <p><span class="text-red-800">Teléfono: </span>{{$boda->tlfNovio}}</p>
                             <p><span class="text-red-800">Correo: </span>{{$boda->emailNovio}}</p><br>
                             </div>
                             <div class="mx-auto text-left py-2">
                             <h3 class="text-2xl py-2">Datos de la Novia</h3>
                             <p><span class="text-red-800">Nombre: </span>{{$boda->nomNovia}}</p>
                             <p><span class="text-red-800">Dirección: </span>{{$boda->dirNovia}}</p>
                             <p><span class="text-red-800">Teléfono: </span>{{$boda->tlfNovia}}</p>
                             <p><span class="text-red-800">Correo: </span>{{$boda->emailNovia}}</p><br>
                             </div>
                             <div class="py-4">
                             <x-jet-button id="btnActualizarBoda"  class="bg-blue-500 hover:bg-blue-800 px-2 py-2">
                                 Actualizar
                            </x-jet-button>
                            <x-jet-button type="button" id="btnAtrasBoda" onclick="window.location='{{ URL::previous() }}'"  class="bg-yellow-500 hover:bg-yellow-600 px-2 py-2">
                                Atrás
                           </x-jet-button>
                            </div>
                             @endforeach
                         </div>
                        </form> --}}

                        
                     </div>

            </div>
        </div>
    </div>
</x-app-layout>
