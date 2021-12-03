<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />

    <title>{{$presupuesto->nomPresupuesto}}</title>

    <link href="{{asset('css/mis_estilos.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css" />
    <style>
        @page {
               margin: 0.5cm 2cm;
               font-size: 14px;
            }
    </style>
</head>

<body>

    <div class="centrar-logo">
        <img src="{{asset('img/logo_150.png')}}" alt="logo">
    </div>
    <h1 class="font-size-h1">Presupuesto AD1080</h1>
    <h1 id="nomPresupuesto" class="font-size-h2">{{$presupuesto->nomPresupuesto}}</h1>
    <h3 class="font-size-h3">Datos Generales</h3>
    <p id="fechaBoda" class="font-size-p"><span class="text-resalto">Fecha Creacion: </span>{{$presupuesto->fechaPresupuesto}}</p>
    <p class="font-size-p"><span class="text-resalto">Precio Total: </span>{{$presupuesto->precioTotal}} €</p>
    <p class="font-size-p"><span class="text-resalto">Observaciones: </span>
        @if ($presupuesto->observaciones == "")
            "No se añadieron observaciones"
        @endif{{$presupuesto->observaciones}} 
    </p>
    <p class="font-size-p"><span class="text-resalto">¿Está pagado? </span>{{$presupuesto->pagado}} </p>
    
    <h3 class="font-size-h3">Datos de la boda</h3>
    <p class="font-size-p"><span class="text-resalto">Día de la boda: </span>{{$boda->fechaBoda}} , a las {{$boda->horaBoda}}</p>
    <p class="font-size-p"><span class="text-resalto">Nombre de la boda: </span>{{$boda->nomBoda}} </p>
    <p class="font-size-p"><span class="text-resalto">Nombre de la novia: </span>{{$boda->nomNovia}}<br><span class="text-resalto">Tlf: </span>{{$boda->tlfNovia}}<br><span class="text-resalto">Email:</span> {{$boda->emailNovia}} <br><br>
    <span class="text-resalto">Nombre del novio: </span>{{$boda->nomNovio}}<br><span class="text-resalto">Tlf: </span>{{$boda->tlfNovio}}<br><span class="text-resalto">Email:</span> {{$boda->emailNovio}}
    </p>                
    
    <h3 class="font-size-h3">Packs</h3>
    <p class="font-size-p"><span class="text-resalto">Nombre del Pack: </span> {{$pack->nomPack}} <br><span class="text-resalto">Precio: </span> {{$pack->precioPack}} € <br><span class="text-resalto">Descripción: </span> {{$pack->descripcion}}</p>    
    
    <h3 class="font-size-h3">Extras</h3>
        @foreach ($extras as $extra)                    
          <p class="font-size-p"><span class="text-resalto">Nombre Extra: </span> {{$extra->nomExtra}} <br><span class="text-resalto">Precio: </span> {{$extra->precioExtra}} € <br><span class="text-resalto">Descripción: </span> {{$extra->descripcion}}</p>
        @endforeach
    
        <h3 class="font-size-h3">Promociones</h3>
        <p class="font-size-p"><span class="text-resalto">Promoción: </span> {{$promo->nomPromo}} <br><span class="text-resalto">Descuento: </span> {{$promo->descuento}} % <br><span class="text-resalto">Descripción: </span> {{$promo->descripcion}}</p>
</body>

</html>