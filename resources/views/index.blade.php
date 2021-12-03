<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AD1080</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> <!-- Aplico estilos tailwind CSS --> --}}
        {{-- <link href="{{asset('css/all.css')}}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="{{asset('css/mis_estilos.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
        <!-- Styles -->
        <style>
            
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    {{-- <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-300 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
                <div class="fixed top-0 right-0 px-6 py-4 sm:block">
                    
                        <a href="{{ route('login') }}" class="text-xl text-gray-700 underline" >Acceder</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-xl text-gray-700 underline">Registro</a>
                        @endif
                  
                </div>
            
            <h1 class="text-4xl">PAGINA PRINCIPAL</h1>
        </div>
        
    </body> --}}
  <body class="text-gray-800 antialiased">
      {{-- NAVEGADOR --}}
    <nav
      class="top-0 absolute z-50 w-full flex flex-wrap items-center px-0 py-4 ">
      <div class="container mx-auto flex flex-wrap items-center">
        <div class="w-full relative flex lg:justify-end sm:justify-between">
            <a href="{{ route('login') }}" class="bg-gray-700 mx-4 px-2 rounded-lg text-2xl hover:bg-gray-300 hover:text-gray-800 text-gray-200" >Acceder</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="bg-gray-700 hover:bg-gray-300 hover:text-gray-800 px-2 rounded-lg text-2xl text-gray-200 ">Registro</a>
            @endif
        </div>        
      </div>
    </nav>
    <main>
      <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="sm:visible md:invisible lg:invisible absolute top-0 w-full h-full bg-center bg-cover" style='background-image: url({{asset('img/fondo1.png')}})'>
          <span
            id="blackOverlay"
            class="w-full h-full absolute opacity-50 bg-black"
          ></span>
        </div>
        <video autoplay muted loop class="invisible sm:invisible md:visible lg:visible video-fondo-pagina-principal absolute w-full ">
          <source src="{{asset('img/videoFondo.mp4')}}" type="video/mp4">
          
        </video>        
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
              <div class="pr-0">
                <h1 class="text-white font-semibold text-7xl">¡No pierdas tiempo!</h1>
                <p class="mt-4 text-xl text-gray-300">
                  Resgístrate en nuestra web en la cual podrás crear el presupuesto para tu boda sin compromiso y nos pondremos en contacto contigo lo antes posible.</p>
                  <p class="mt-4 text-xl text-gray-300">También podrás descargar en PDF y editar la información si hay alguna novedad para que nuestro equipo de fotógrafos y cámaras estén al día.<p>
                </p>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden" style="height: 70px;">
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-gray-300 fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div> --}}
      </div>
      <section class="pb-20 bg-gray-300 -mt-54">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap mx-auto">
            <div class="lg:pt-12 pt-6 w-full lg:max-w-xl md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white hover:bg-blue-100 w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                    <i class="fas fa-camera text-lg"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Experiencia</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Para este día tan especial es importante elegir un buen equipo de fotógrafos que garanticen que dispondréis de un reportaje de calidad, llevan ofreciendo sus servicios desde 1995, podéis confiar en la experiencia y profesionalidad que desde entonces han ofrecido.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full lg:max-w-xl md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white hover:bg-blue-100 w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                    <i class="fas fa-user-friends text-lg"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Forma de Trabajar</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Con cámaras digitales de alta resolución, este equipo hace una media de 1000 fotografías por boda, para que los novios seleccionéis las que finalmente se imprimirán para el álbum, las que formen parte de fotocomposiciones y aquellas que serán retocadas o modificadas.

                    En AD1080 no utilizamos ningún software que realice el montaje de forma automática, confeccionan un diseño personalizado mediante Adobe Photoshop, así garantizan la calidad y la personalización del álbum.
                  </p>
                </div>
              </div>
            </div>
            <div class="pt-6 w-full lg:max-w-60 md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white hover:bg-blue-100 w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                    <i class="fas fa-shopping-cart text-lg"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Servicios</h6>
                  <p class="mt-2 mb-4 text-gray-600">
                    Foto, vídeo, preboda, postboda, álbumes, mini álbumes, álbum digital, dron, vídeo streaming, fotografías en alta resolución, negativos, SDE "Edición y montaje en directo del vídeo de vuestra boda en mismo día de la celebración". No se entregan soporte con fotos, ya que utilizamos servidor propio con enlace de descarga 
                  </p>
                </div>
              </div>
            </div>
          </div>          
        </div>
      </section>
      {{-- SECCION DE FOTOGRAFIAS --}}
      <section class="relative py-20">
        <div
          class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
          style="height: 80px;"
        >
          <svg
            class="absolute bottom-0 overflow-hidden"
            xmlns="http://www.w3.org/2000/svg"
            preserveAspectRatio="none"
            version="1.1"
            viewBox="0 0 2560 100"
            x="0"
            y="0"
          >
            <polygon
              class="text-white fill-current"
              points="2560 0 2560 100 0 100"
            ></polygon>
          </svg>
        </div>
        <div class="container mx-auto px-4">
          <div class="items-center flex flex-wrap">
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4 py-4">
              <img
                alt="novios"
                class="max-w-full rounded-lg shadow-lg"
                src="{{asset('img/novios.jpg')}}"
              />
            </div>
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4 py-4">
              <img
                alt="novios"
                class="max-w-full rounded-lg shadow-lg"
                src="{{asset('img/anillos01.jpg')}}"
              />
            </div>
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4 py-4">
              <img
                alt="novios"
                class="max-w-full rounded-lg shadow-lg"
                src="{{asset('img/vestido.jpg')}}"
              />
            </div>
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4 py-4">
              <img
                alt="novios"
                class="max-w-full rounded-lg shadow-lg"
                src="{{asset('img/novia02.jpg')}}"
              />
            </div>
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4 py-4">
              <img
                alt="novios"
                class="max-w-full rounded-lg shadow-lg"
                src="{{asset('img/novio03.jpg')}}"
              />
            </div>
            <div class="w-full md:w-4/12 ml-auto mr-auto px-4 py-4">
              <img
                alt="novios"
                class="max-w-full rounded-lg shadow-lg"
                src="{{asset('img/novia01.jpg')}}"
              />
            </div>
          </div>
        </div>
      </section>
      {{-- COMENTARIOS BODAS.NET --}}
      <section class=" relative block bg-gray-100 max-w-4xl mx-auto mb-24 ">
        <div class="textwidget custom-html-widget"><script type="text/javascript" src="https://cdn1.bodas.net/js/wp-widget.js?nossl-20181030-04ES143-1"></script>
            <div id="wp-widget-reviews"><div class="weddingwireWidget weddingwireWidget--white">
                <div class="weddingwireWidget__header">
                    <span class="weddingwireWidget__title">Nuestros Comentarios en Bodas.net</span>
                    <div class="weddingwireWidget__ratingstars">
                        <div class="rating-stars-vendor rating-stars-vendor-large">
                            <span class="rating-stars-vendor rating-stars-vendor-bar" style=" width:99%;"></span>
                        </div>
                        <span class="weddingwireWidget__ratinglabel">
                                                14 opiniones                            </span>
                    </div>
                    <div class="weddingwireWidget__rating">
                        5.0 sobre 5        </div>
                </div>
                <div>
                                            <div class="weddingWireWidgetReview">
                            <div class="weddingWireWidgetReview__header">
                                <div class="weddingWireWidgetReview__avatar">
                                                                                                        <div class="avatar  " data-testid="partials-complete-avatar">    <figure>
                    <img class="avatar-thumb" src="https://cdn0.bodas.net/usuarios/fotos/3/3/4/7/utpp_4933347.jpg?r=76900" loading="lazy" alt="Jessy" width="">
                        </figure>
            </div>
                                                                                    </div>
                                <div class="weddingWireWidgetReview__user">
                                    Jessy M.                                                                                <span class="weddingWireWidgetReview__timestamp">
                                            · Se casó el 11/09/2021                            </span>
                                                            <div class="weddingWireWidgetReview__rating">
                                        <div class="rating-stars-vendor">
                                            <span class="rating-stars-vendor rating-stars-vendor-bar" style=" width:100%;"></span>
                                        </div>
                                        <span class="vendors-reviews-count">5.0</span>
                                    </div>
                                </div>
                            </div>
                                                <div class="weddingWireWidgetReview__title">
                                    Fotografías magníficas                     </div>
                                            <p class="weddingWireWidgetReview__post">
                                                        Personas encantadoras, amables, se adaptaron a nuestras peticiones, salieron unas fotos magníficas. Durante la sesión nos sentimos muy cómodo trabajando con ellos. Gracias a ellos ...                         <a href="https://www.bodas.net/fotografos/alta-definicion-1080-rafa-millan--e65815/opiniones" target="_blank">Leer más</a>
                                                </p>
                        </div>
                                            <div class="weddingWireWidgetReview">
                            <div class="weddingWireWidgetReview__header">
                                <div class="weddingWireWidgetReview__avatar">
                                                                                                        <div class="avatar  " data-testid="partials-complete-avatar">    <figure>
                    <img class="avatar-thumb" src="https://cdn0.bodas.net/usuarios/fotos/4/0/4/2/utpp_3954042.jpg?r=47394" loading="lazy" alt="Loreto" width="">
                        </figure>
            </div>
                                                                                    </div>
                                <div class="weddingWireWidgetReview__user">
                                    Loreto A.                                                                                <span class="weddingWireWidgetReview__timestamp">
                                            · Se casó el 17/07/2021                            </span>
                                                            <div class="weddingWireWidgetReview__rating">
                                        <div class="rating-stars-vendor">
                                            <span class="rating-stars-vendor rating-stars-vendor-bar" style=" width:100%;"></span>
                                        </div>
                                        <span class="vendors-reviews-count">5.0</span>
                                    </div>
                                </div>
                            </div>
                                                <div class="weddingWireWidgetReview__title">
                                    Servicio magnífico                    </div>
                                            <p class="weddingWireWidgetReview__post">
                                                        Ofrecen un servicio y una atención excepcionales. Son muy atentos y considerados. Totalmente recomendable.                                     </p>
                        </div>
                                            <div class="weddingWireWidgetReview">
                            <div class="weddingWireWidgetReview__header">
                                <div class="weddingWireWidgetReview__avatar">
                                                                                                        <div class="avatar  " data-testid="partials-complete-avatar">    <div class="avatar-alias size-avatar-small ">
                    <svg class="avatar-generic" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" preserveAspectRatio="xMidYMin slice">
                        <circle fill="#EAB6AD" cx="100" cy="100" r="100"></circle>
                        <text transform="translate(100,130)" y="0">
                            <tspan font-size="90" class="" fill="rgba(0,0,0,0.3)" text-anchor="middle">R</tspan>
                        </text>
                    </svg>
                </div>
            </div>
                                                                                    </div>
                                <div class="weddingWireWidgetReview__user">
                                    Ros                                                                                <span class="weddingWireWidgetReview__timestamp">
                                            · Se casó el 10/07/2021                            </span>
                                                            <div class="weddingWireWidgetReview__rating">
                                        <div class="rating-stars-vendor">
                                            <span class="rating-stars-vendor rating-stars-vendor-bar" style=" width:100%;"></span>
                                        </div>
                                        <span class="vendors-reviews-count">5.0</span>
                                    </div>
                                </div>
                            </div>
                                                <div class="weddingWireWidgetReview__title">
                                    Encantados                     </div>
                                            <p class="weddingWireWidgetReview__post">
                                                        Lo recomendamos 100% un trato de 10, profesionalidad de 10, estamos muy contentos con el trabajo realizado. Hemos recibido el álbum antes de lo que nosotros esperamos, y es una mar...                         <a href="https://www.bodas.net/fotografos/alta-definicion-1080-rafa-millan--e65815/opiniones" target="_blank">Leer más</a>
                                                </p>
                        </div>
                        </div>
                <div class="weddingwireWidget__footer">
                    <a id="weddingwire-button" class="weddingwireWidget__btnOutline" href="https://www.bodas.net/fotografos/alta-definicion-1080-rafa-millan--e65815/opiniones" target="_blank">
                        Lee todas nuestras opiniones        </a>
                    <a class="nounder small" href="https://www.bodas.net" title="Bodas.net" target="_blank">
                        <object class="mt10" type="image/svg+xml" data="https://cdn1.bodas.net/assets/img/logos/gen_logoHeader.svg" height="25">
                        </object>
                    </a>
                </div>
            </div></div>
            <script>wpShowReviews(65815, "white");</script>
            </div>
      </section>
      {{-- FORMULARIO DE CONTACTO --}}
      
    </main>
    <footer class="relative bg-gray-300 pt-8 pb-6">
        <div class="text-center flex justify-center items-center">
            <div class="flex-row py-2 px-4">
                <p class="text-base">Todos los derechos reservados, Copyright &#169; 2021</p> <p class="text-xl">Creado por Adrián Sánchez Millán</p>
            </div>
            <a href="https://www.linkedin.com/in/adriansanchezmillan/" title="Perfil de Adrián Sánchez Millán">
            <div class="w-28">
                <img src="{{ asset('img/qr-code_AdrianSanchezMillan.png') }}" alt="QR-Adrian Sanchez Millan">
            </div>
            </a>
        </div>
    </footer>
  </body>
  <script>
    function toggleNavbar(collapseID) {
      document.getElementById(collapseID).classList.toggle("hidden");
      document.getElementById(collapseID).classList.toggle("block");
    }
  </script>

</html>
