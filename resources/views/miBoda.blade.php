<x-app-layout>
    @Push('head')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
    <script src="{{ asset('js/formulario_MiBoda.js') }}"defer></script>
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

                            @if (count(Illuminate\Support\Facades\DB::select("select idUserFK from bodas where idUserFK = ".Auth::user()->id)) == 0)
                                <p class="text-5xl py-2">Aún no tienes niguna boda registrada.</p>
                                <p class="text-3xl text-center text-red-500 py-2">Por favor cree una nueva boda antes en el apartado <a href="{{route('crearBoda')}}">Boda</a></p>
                            @endif
                            
                             @foreach ($bodas as $boda)

                        <form id="formulario_EditarBoda" action="{{route('editarMiBoda',$boda->id)}}" method="POST">
                            @csrf                            

                             <h3 class="text-3xl">Boda de: {{$boda->nomBoda}}</h3>                              
                                                         
                         </div>
                         <div id="datosBoda" class="mx-auto text-center lg:w-2/4 sm:w-2/4">
                            <div class="mx-auto lg:text-left sm:text-center py-2">
                            <h3 class="text-2xl py-2">Datos Generales</h3>
                             <p><span class="text-red-800">Fecha: </span>{{$boda->fechaBoda}}</p>
                             <p><span class="text-red-800">Hora de la Celebración: </span>{{$boda->horaBoda}}</p>
                             <p><span class="text-red-800">Ceremonia: </span>{{$boda->ceremonia}}</p>
                             <p><span class="text-red-800">Celebración: </span>{{$boda->celebracion}}</p>
                             <br>
                             <p><span class="text-red-800">Última modificación realizada: </span>{{\Carbon\Carbon::parse($boda->updated_at)->diffForHumans()}} el día {{$boda->updated_at}}</p>
                            </div>
                            <div class="mx-auto lg:text-left sm:text-center py-2">
                             <h3 class="text-2xl py-2">Datos del Novio</h3>
                             <p><span class="text-red-800">Nombre: </span>{{$boda->nomNovio}}</p>
                             <p><span class="text-red-800">Dirección: </span>{{$boda->dirNovio}}</p>
                             <p><span class="text-red-800">Teléfono: </span>{{$boda->tlfNovio}}</p>
                             <p><span class="text-red-800">Correo: </span>{{$boda->emailNovio}}</p><br>
                             </div>
                             <div class="mx-auto lg:text-left sm:text-center py-2">
                             <h3 class="text-2xl py-2">Datos de la Novia</h3>
                             <p><span class="text-red-800">Nombre: </span>{{$boda->nomNovia}}</p>
                             <p><span class="text-red-800">Dirección: </span>{{$boda->dirNovia}}</p>
                             <p><span class="text-red-800">Teléfono: </span>{{$boda->tlfNovia}}</p>
                             <p><span class="text-red-800">Correo: </span>{{$boda->emailNovia}}</p><br>
                             </div>
                             <div class="py-4">
                             <x-jet-button id="btnEditarBoda" type="button" onclick="window.location='{{ route('editarMiBoda',$boda->id) }}'" class="bg-blue-500 hover:bg-blue-800 px-2 py-2">
                                 Editar
                            </x-jet-button>
                            <x-jet-button id="btnPDFBoda" type="button" onclick="window.location='{{ route('obtenerPDF',$boda->id) }}'" class="bg-red-500 hover:bg-red-700 px-2 py-2">
                                <span class="icon is-small">
                                    <i class="fas fa-file-pdf"></i>
                                </span>
                                <span>Descargar PDF</span>
                           </x-jet-button>
                            </div>
                             @endforeach
                            </div>
                        </form>

                        
                     </div>

            </div>
        </div>
    </div>
</x-app-layout>
