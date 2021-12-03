<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacto</title>
    
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
    <div class="centrar-logo">
        <img src="{{asset('img/logo_150.png')}}" alt="logo">
    </div>
    <h1 class="font-size-h2">Información de Contacto</h1>
    <h3 class="font-size-h3">Datos de Contacto</h3>
    <p class="font-size-p"><span class="text-resalto">Nombre:</span> {{$contacto['nombreContacto']}}</p>
    <p class="font-size-p"><span class="text-resalto">Fecha de la boda:</span> {{$contacto['fechaContacto']}}</p>
    <p class="font-size-p"><span class="text-resalto">Hora de la boda:</span> @if ($contacto['horaContacto'] == "")"No se añadieron datos"@endif{{$contacto['horaContacto']}}</p>
    <p class="font-size-p"><span class="text-resalto">Teléfono:</span> {{$contacto['tlfContacto']}}</p>
    <p class="font-size-p"><span class="text-resalto">Email:</span> {{$contacto['emailContacto']}}</p>
    <p class="font-size-p"><span class="text-resalto">Ceremonia:</span> @if ($contacto['ceremoniaContacto'] == "")"No se añadieron datos"@endif{{$contacto['ceremoniaContacto']}}</p>
    <p class="font-size-p"><span class="text-resalto">Mensaje:</span> {{$contacto['mensajeContacto']}}</p>
</body>
</html>