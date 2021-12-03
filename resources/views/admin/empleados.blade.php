@extends('adminlte::page')

@section('title', 'AD1080')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js" defer></script>
<script src="{{ asset('js/checkEnviarEmail.js') }}" defer></script>
<style>
    .dt-buttons{
        padding-bottom: 1rem !important;
        width: 50%;
    }
    .btn{
        padding: 0.5rem;
        justify-content: center;
        margin-right: 5px;
        
        
    }
    @media (max-width: 576px) {
        .btn{
            width: 50%;
            margin-bottom: 2px;
            border-radius: 0%;
        }
        .dt-buttons{
                width: 100%;
            }
    }
</style>
@endsection

@section('content_header')
<div class="rounded text-center  bg-info py-3">
    <h1>Empleados</h1>
</div>
@stop

@section('content')
<div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
             <div class="card">
                 <div class="card-body">           
                    <!-- component -->
                    <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-0">    
                          
                        <form id="formulario_Empleado" class="formulario_Empleado" action="{{route('admin.enviarMailBodaEmpleado')}}" method="POST">
                            @csrf
                        
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-4">
                                    <label class="md:text-sm text-lg text-black-500">Seleccione Boda para enviar: </label>
                                    
                                  <select class="w-full lg:w-96 rounded-full py-2 px-3 border-2 border-black-500 mt-1 focus:outline-none focus:ring-2 focus:ring-black-600 focus:border-transparent" name="comboBodaEmpleado" id="comboBodaEmpleado" >
                                    @foreach ($bodas as $boda)
                                        <option data-nombre="{{$boda['nomBoda']}}" data-fecha="{{$boda['fechaBoda']}}" value="{{$boda['id']}}">{{$boda['fechaBoda']}} - {{$boda['nomBoda']}}</option>
                                    @endforeach
                                  </select>
                                  <button class="w-40 btn-info hover:bg-green-600 text-white font-bold py-2 px-4 mt-2 rounded-full" type="submit"  id="btnEnviarPDFEmpleado" name="btnEnviarPDFEmpleado">
                                    
                                    <span class="text-base">Enviar</span>
                                </button>
                                </div>
                            
                          
                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            
                            
                                @foreach ($user as $indice => $valor)
                                <div class="w-full bg-white rounded-lg sahdow-lg overflow-hidden flex flex-col md:flex-row border-gray-700 border-2">
                                <div class="w-full text-left p-6 md:p-4 space-y-2 bg-yellow-300">
                                    <p class="text-xl text-gray-700 font-bold">{{$valor->name}}</p>
                                    <p class="text-lg text-blue-700 font-normal">{{$valor->categoria}}</p>
                                    <p class="text-base leading-relaxed text-gray-800 font-normal">Email: {{$valor->email}}</p>
                                    <div class="flex justify-start space-x-2">                                        
                                        <div class="field is-horizontal">
                                            <div class="field-label is-normal">
                                                <label class="inline-flex items-center">
                                                    <input type="checkbox" class="form-check" id="emailUsuarios" name="emailUsuarios[]" value="{{$valor->email}}">
                                                    <span class="ml-2">Enviar email</span>
                                                  </label>
                                            </div>
                                          </div>                                      
                                    </div>
                                </div>
                                </div>
                                @endforeach
                            
                        </div>
                        </form>

                    </section>

                </div>    
             </div>

            {{-- </div> --}}
        
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

        <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
        
        
    <script>
        
        $(document).ready(function() {
            $('#tabla-usuarios').DataTable({
                procesing: true,
                serverSider: true,
                ajax: '{!! route('usuarios') !!}',

                lengthChange: true,
                lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
                responsive: true,
                autoWidth: false,

        columns:[
            {data:'id', name:'id','width':'50px'},
            {data:'name', name:'name','width':'100px'},
            {data:'email', name:'email','width':'100px'},
            {data:'categoria', name:'categoria','width':'100px'},
            {data:'created_at', name:'created_at','width':'100px'},
            {data:'updated_at', name:'updated_at','width':'100px'},
            {data:'editar', name:'editar','width':'100px', orderable: false, searchable: false},
            
            ],

       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },
        dom: "B<'row'<'col-sm-6'l><'col-sm-6'f><'text-center'>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'<'#colvis'>p>>",
       
        buttons:[
                {
                    extend: 'excelHtml5',
                    text: '<span class="icon is-normal"><i class="fas fa-file-excel"></i></span> EXCEL',                                        
                    tittleAttr: 'Exportar a Excel',
                    className: 'btn btn-success',
                    exportOptions: {
                    columns: ":not(.no-exportar)"
                    },          
                },
                {
                    extend: 'pdfHtml5',
                    text: '<span class="icon is-normal"><i class="fas fa-file-pdf"></i></span> PDF', 
                    tittleAttr: 'Exportar a PDF',
                    className: 'btn btn-danger',
                    exportOptions: {
                    columns: ":not(.no-exportar)"
                    },
                    //orientation: 'portrait',
                    pageSize: 'A4',

                    customize:function(doc) {
                        doc.styles.title = {
                            color: '#292b2c',
                            fontSize: '25',
                            alignment: 'center'
                        }
                        doc.styles['td:nth-child(2)'] = { 
                            width: '100px',
                            'max-width': '100px'
                        },
                        doc.styles.tableHeader = {
                        fillColor:'#5bc0de',
                        color:'white'
                        }
                    }
                },
                {
                    extend: 'copyHtml5',
                    text: '<span class="icon is-normal"><i class="far fa-copy"></i></span> COPIAR', 
                    tittleAttr: 'Imprimir',
                    className: 'btn btn-warning',
                    exportOptions: {
                    columns: ":not(.no-exportar)"
                    },
                },
                {
                    extend: 'print',
                    text: '<span class="icon is-normal"><i class="fas fa-print"></i></span> IMPRIMIR', 
                    tittleAttr: 'Imprimir',
                    className: 'btn btn-secundary',
                    exportOptions: {
                    columns: ":not(.no-exportar)"
                    }
                },
              
            ],
        });
});


    </script>
@stop