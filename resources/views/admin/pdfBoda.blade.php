<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />

    <title>{{$boda->nomBoda}}</title>

    <link rel="stylesheet" href="css/normalize.css" />
    <link href="{{asset('css/mis_estilos.css')}}" rel="stylesheet">
<style>
    @page {
           margin: 0.5cm 2cm;
           font-size: 14px;
        }
</style>
</head>

<body>
    <div>
    <div class="centrar-logo">
        <img src="{{asset('img/logo_150.png')}}" alt="logo">
    </div>
    <h1>Boda de {{$boda->nomBoda}} </h1>

    <h3 class="font-size-h3">Datos Generales</h3>
    <p id="fechaBoda" class="font-size-p"><span class="text-resalto">Fecha:</span> {{$boda->fechaBoda}} a las {{$boda->horaBoda}} horas.</p>
    <p class="font-size-p"><span class="text-resalto">Ceremonia en:</span> {{$boda->ceremonia}}</p>
    <p class="font-size-p"><span class="text-resalto">Celebración:</span> {{$boda->celebracion}}</p>
    <p class="font-size-p"><span class="text-resalto">Descripción:</span> 
        @if ($boda->descripcion == "")
        "No se añadieron datos"
        @endif
        {{$boda->descripcion}}
    </p>
    <h3 class="font-size-h3">Datos del novio</h3>
    <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$boda->nomNovio}}</p>
    <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$boda->tlfNovio}}</p>
    <p class="font-size-p"><span class="text-resalto">Dirección:</span> {{$boda->dirNovio}}</p>
    <p class="font-size-p"><span class="text-resalto">Email:</span> {{$boda->emailNovio}}</p>
    <h3 class="font-size-h3">Datos de la novia</h3>
    <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$boda->nomNovia}}</p>
    <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$boda->tlfNovia}}</p>
    <p class="font-size-p"><span class="text-resalto">Dirección:</span> {{$boda->dirNovia}}</p>
    <p class="font-size-p"><span class="text-resalto">Email:</span> {{$boda->emailNovia}}</p>
</div>
</body>

</html>