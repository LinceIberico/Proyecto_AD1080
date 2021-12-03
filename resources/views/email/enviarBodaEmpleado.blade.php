<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boda</title>

    <link rel="stylesheet" href="css/normalize.css" />
    {{-- <link href="{{asset('css/mis_estilos.css')}}" rel="stylesheet"> --}}

    <style>
        a {
            text-decoration: none !important;
        }
        
        .font-size-h2 {
            font-size: 1.5rem;
            color: #17a2b8 !important;
        }
        
        .font-size-h3 {
            font-size: 1.5rem;
            color: #dc3545 !important;
        }
        
        .font-size-p {
            font-size: 1.3rem;
        }
        
        .text-resalto {
            color: #145763 !important;
            font-weight: 600;
        }
        
        .centrar-logo {
            margin-left: 37%;
        }
    </style>
</head>
<body>
    <div>
        <div class="centrar-logo">
            <img src="{{asset('img/logo_150.png')}}" alt="logo">
        </div>
        
        @foreach ($datosBoda as $valor)
            
        <h1 id="nomBoda">Boda de {{$valor['nomBoda']}} </h1>
        
        <h3 class="font-size-h3">Datos Generales</h3>
        <p id="fechaBoda" class="font-size-p"><span class="text-resalto">Fecha:</span> {{$valor['fechaBoda']}} a las {{$valor['horaBoda']}} horas.</p>
        <p class="font-size-p"><span class="text-resalto">Ceremonia en:</span> {{$valor['ceremonia']}}</p>
        <p class="font-size-p"><span class="text-resalto">Celebración:</span> {{$valor['celebracion']}}</p>
        <p class="font-size-p"><span class="text-resalto">A tener en cuenta:</span> 
            @if ($valor['descripcion'] == "")
            "No se añadieron datos"
            @endif
            {{$valor['descripcion']}}
        </p>
        <h3 class="font-size-h3">Datos del novio</h3>
        <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$valor['nomNovio']}}</p>
        <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$valor['tlfNovio']}}</p>
        <p class="font-size-p"><span class="text-resalto">Dirección:</span> {{$valor['dirNovio']}}</p>
        <p class="font-size-p"><span class="text-resalto">Email:</span> {{$valor['emailNovio']}}</p>
        <h3 class="font-size-h3">Datos del novia</h3>
        <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$valor['nomNovia']}}</p>
        <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$valor['tlfNovia']}}</p>
        <p class="font-size-p"><span class="text-resalto">Dirección:</span> {{$valor['dirNovia']}}</p>
        <p class="font-size-p"><span class="text-resalto">Email:</span> {{$valor['emailNovia']}}</p>
        @endforeach
    </div>
</body>
</html>