@extends('adminlte::page')

@section('title', 'AD1080')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css"> 
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
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
    <h1>Presupuestos</h1>
</div>
@stop

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-xl sm:rounded-lg">
             <div class="card">
                 <div class="card-body">                     
                    <table class="table table-striped table-bordered  display-nowrap " style="width:100%" id="tabla-presupuesto">
                        <thead>
                            <th class="no-exportar">ID</th>
                            <th>Presupuesto</th>
                            <th>Creado</th>
                            <th>Precio Total</th>
                            <th>Observaciones</th>
                            <th>Pagado</th>
                            <th>Boda</th>
                            <th>Fecha Boda</th>
                            <th>Pack</th>
                            {{-- <th>Extras</th> --}}
                            <th>Promocion</th>
                            <th>Última Actualización</th>
                            <th width="100px" class="no-exportar">Mostrar</th>
                            <th width="100px" class="no-exportar">Editar</th>                           
                        </thead>
                        {{-- <tbody>
                            @foreach ($presupuestos as $presupuesto)
                            <tr>
                             <td>{{$presupuesto->id}}</td>
                             <td>{{$presupuesto->nomPresupuesto}}</td>
                             <td>{{$presupuesto->fechaPresupuesto}}</td>
                             <td>{{$presupuesto->precioTotal}}</td>
                             <td>{{$presupuesto->observaciones}}</td>
                             <td>{{$presupuesto->pagado}}</td>
                             <td>{{$presupuesto->nomBoda}}</td>
                             <td>{{$presupuesto->fechaBoda}}</td>
                             <td>{{$presupuesto->nomPack}}</td>
                             
                             @foreach ($extras as $extra)
                             <td>{{$extra->nomExtra}}</td>                                 
                             @endforeach
                             
                             <td>{{$presupuesto->updated_at}}</td>
                             <td><a href="" type="button" name="btnEditar" id="btnEditar" class="btn btn-primary">Editar/Baja</a></td>
                            </tr>
                      
                            @endforeach --}}
                      
                        </tbody>

                    </table>            
                </div>    
             </div>
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
    var table = $('#tabla-presupuesto').DataTable( {
        procesing: true,
        serverSider:true,
        ajax: '{!! route('presupuestos.index') !!}',
        // ajax:{
        //    url : '{{ route('presupuestos.index') }}',
        //    type: "GET",
        //    data: {"data": data}
        //  },

        lengthChange: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "Todos"] ],
        responsive: true,
        autoWidth: true,
        order:[[0,'DESC']],

        columns:[
            {data:'id', name:'id'},
            {data:'nomPresupuesto', name:'nomPresupuesto'},
            {data:'fechaPresupuesto', name:'fechaPresupuesto'},
            {data:'precioTotal',render: $.fn.dataTable.render.number( ',', '.', 2, '', ' €' ) , name:'precioTotal'},
            {data:'observaciones', name:'observaciones'},
            {data:'pagado', name:'pagado'},
            {data:'nomBoda', name:'nomBoda'},
            {data:'fechaBoda', name:'fechaBoda'},
            {data:'nomPack', name:'nomPack'},
            // {data:'nomExtra', name:'nomExtra'},        
            {data:'nomPromo', name:'nomPromo'},            
            {data:'updated_at', name:'updated_at'},
            {data:'mostrar', name:'mostrar','width':'100px', orderable: false, searchable: false},
            {data:'editar', name:'editar','width':'100px', orderable: false, searchable: false},
            ],

       "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
        },

        dom: "B<'row'<'col-sm-6'l><'col-sm-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-5'i><'col-sm-7'<'#colvis'>p>>",
        
        buttons:[
                {
                    text: '<span class="icon is-normal"><i class="fas fa-plus"></i></span> NUEVO',                                        
                    tittleAttr: 'Crear Nuevo',
                    attr:  {                    
                        id: 'nueva-extra',
                        onclick: "window.location.href="+"'{{route('presupuestos.create')}}'",
                    },                
                    className: 'btn btn-info',
                },
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
    } );


      
    </script>
@stop