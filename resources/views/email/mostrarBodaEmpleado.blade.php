<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="css/normalize.css" />
    <link href="{{asset('css/mis_estilos.css')}}" rel="stylesheet">
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
        <p class="font-size-p"><span class="text-resalto">A tener en cuenta:</span> 
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