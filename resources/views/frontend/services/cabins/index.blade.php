@extends('frontend.layouts.index')

@section('content')
<div id="home-section" class="container-fluid">
    <div class="d-flex flex-column contPadre">
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm px-lg-5 py-3">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="https://huitzilcalli.com/resources/img/logo-lg.webp" alt="Logo" width="40" height="40" class="d-inline-block align-text-top me-2">
                <span class="fw-bold text-uppercase" style="font-family: 'Oswald'; color: #194421; letter-spacing: 1px;">Huitzilcalli</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-bold text-uppercase small" style="font-family: 'Oswald';">
                    <li class="nav-item"><a class="nav-link px-3" href="#cabins-section">Cabañas</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#promotions-section">Promociones</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#amenities-section">Amenidades</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="https://facebook.com/{{ $user->facebook }}" target="_blank">Contacto</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex flex-column contPadre" style="padding-top: 80px;">
        <header id="hero-section" class="w-100 d-flex flex-column justify-content-center align-items-center text-center py-5 mb-4" style="background: linear-gradient(rgba(25, 68, 33, 0.05), rgba(4, 163, 158, 0.05));">
            <div class="container overflow-hidden">
                <div class="row justify-content-center">
                    <div class="col-lg-8" data-aos="fade-up">
                        <h1 class="display-4 fw-bolder text-uppercase mb-3" style="font-family: 'Oswald'; color: #194421;">
                            Tu Refugio Natural en el Corazón de Aguascalientes
                        </h1>
                        <p class="fs-5 text-secondary mb-4 mx-auto" style="max-width: 600px;">
                            Descubre la paz y el confort de nuestras cabañas exclusivas. El lugar perfecto para desconectarte y reconectar con la naturaleza.
                        </p>
                        <a href="#cabins-section" class="btn btn-lg text-white px-5 py-3 shadow-sm" style="background-color: #04A39E; border-radius: 3rem; font-family: 'Oswald';">
                            Explorar Cabañas
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div id="cabins-section" style="flex-grow: 1; flex-direction: column; align-items: center;" class="d-flex d-md-block d-lg-block pt-4">
        <!-- <h2>Cabañas</h2>
        <hr> -->
        <div class="row justify-content-evenly align-items-center w-100 listaItems"
            style="">
            @foreach($cabins as $c => $cabin)
                <div class="col-xl-2 col-lg-2 col-md-2 d-flex">
                    <a href="{{ route('detalles', ['slug' => $cabin->slug]) }}"
                        class="btn text-decoration-none text-white w-100 d-flex flex-column flex-fill p-0 border-0 overflow-hidden cabin-card my-2"
                        style="transition: all 0.15s ease-in-out; border-radius: 2rem;">

                        @if(count($cabin->gallery) > 0)
                            <div class="imgCab-container w-100 d-flex"
                                style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem; aspect-ratio: 1/1;">
                                <div id="carousel-{{ $cabin->id }}" class="carousel slide carousel-fade w-100 d-flex"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner d-flex flex-fill" style="">
                                        @foreach($cabin->gallery as $g => $photo)
                                            <div class="carousel-item @if($g == 0) active @endif"
                                                style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem; object-fit: cover; background-image: url('https://huitzilcalli.com/public{{ $photo->route }}'); background-size: cover; background-repeat:no-repeat; background-position: center;">
                                                <!--<img src="" class="d-block w-100 img-fluid" style="object-fit: cover; background-image: url('https://huitzilcalli.com/LaurelesCalvillo/public{{ $photo->route }}'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;" alt="">-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="cabin-title p-2">
                            <div class=" w-100 d-flex justify-content-center align-items-center">
                                <i class="uil uil-estate fs-4 me-2 card-icon"></i>
                                <h1 class="fs-3 mb-0 nombreCabania">
                                    {{ $cabin->name }}
                                </h1>
                            </div>
                            @if(isset($cabin->amenities) && isset($cabin->amenities[0]) && false)
                                <span class="fs-5">({{ $cabin->amenities[0]->specifications }})</span>
                            @endif

                            <span class="fs-5">({{ $cabin->capacity }} Personas)</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div id="promotions-section" class="row justify-content-center align-items-center w-100 my-4 py-5">
            <div class="col-12 text-center">
                <h2 class="fw-bolder text-uppercase mb-3" style="color: #04A39E; font-family: 'Oswald';">Promociones Exclusivas</h2>
                @if(isset($promotions) && count($promotions) > 0)
                    <div class="row justify-content-center px-3">
                        @foreach($promotions as $promotion)
                            <div class="col-xl-3 col-lg-4 col-md-6 mb-3">
                                <div class="card border-0 shadow-sm promotion-card" style="border-radius: 1.5rem; overflow: hidden; background-color: #f8f9fa; transition: transform 0.2s;">
                                    @php
                                        $clean_phone = preg_replace('/[^0-9]/', '', $user->phone);
                                        $wa_message = urlencode("Hola, me gustaría obtener más información sobre la promoción: " . $promotion->title);
                                        $wa_url = "https://api.whatsapp.com/send?phone=" . $clean_phone . "&text=" . $wa_message;
                                    @endphp
                                    <a href="{{ $wa_url }}" target="_blank" class="text-decoration-none h-100">
                                        @if($promotion->image)
                                            <div style="height: 200px; overflow: hidden;">
                                                <img src="{{ asset('public/' . $promotion->image) }}" class="card-img-top h-100 w-100" style="object-fit: cover;" alt="{{ $promotion->title }}">
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title fw-bold" style="color: #194421;">{{ $promotion->title }}</h5>
                                            <p class="card-text text-secondary small">{{ $promotion->description }}</p>
                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                <span class="btn btn-sm text-white px-3" style="background-color: #25D366; border-radius: 1rem;">
                                                    <i class="uil uil-whatsapp me-1"></i> Consultar
                                                </span>
                                                @if($promotion->external_link)
                                                    <a href="{{ $promotion->external_link }}" onclick="event.stopPropagation();" target="_blank" class="btn btn-sm text-white" style="background-color: #04A39E; border-radius: 1rem;">Ver más</a>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="py-3 px-5 d-inline-block" style="border: 2px dashed #04A39E; border-radius: 2rem; background-color: #f8f9fa;">
                        <span class="fs-4 text-secondary text-uppercase fw-light" style="letter-spacing: 5px;">Próximamente</span>
                    </div>
                @endif
            </div>
        </div>

        <div id="amenities-section" class="row justify-content-evenly align-items-center w-100 listaItems py-5" style="">
            <div class="col-12 text-center mb-4">
                <h2 class="fw-bolder text-uppercase mb-3" style="color: #194421; font-family: 'Oswald';">Nuestras Amenidades</h2>
            </div>
            @foreach($amenities as $c => $amenity)
                <div class="col-xl-2 col-lg-2 col-md-2 d-flex">
                    <a href="{{ route('detalles', ['slug' => $amenity->slug]) }}"
                        class="btn text-decoration-none text-white w-100 d-flex flex-column flex-fill p-0 border-0 overflow-hidden cabin-card my-2"
                        style="transition: all 0.15s ease-in-out; border-radius: 2rem;">

                        @if(count($amenity->gallery) > 0)
                            <div class="imgCab-container w-100 d-flex"
                                style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem; aspect-ratio: 1/1;">
                                <div id="carousel-{{ $amenity->id }}" class="carousel slide carousel-fade w-100 d-flex"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner d-flex flex-fill" style="">
                                        @foreach($amenity->gallery as $g => $photo)
                                            <div class="carousel-item @if($g == 0) active @endif"
                                                style="border-bottom-left-radius: 2rem; border-bottom-right-radius: 2rem; object-fit: cover; background-image: url('https://huitzilcalli.com/public{{ $photo->route }}'); background-size: cover; background-repeat:no-repeat; background-position: center;">
                                                <!--<img src="" class="d-block w-100 img-fluid" style="object-fit: cover; background-image: url('https://huitzilcalli.com/LaurelesCalvillo/public{{ $photo->route }}'); background-size: cover; background-repeat:no-repeat; background-position: center; min-height: 15rem; max-height: 12rem;" alt="">-->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="cabin-title p-2">
                            <div class=" w-100 d-flex justify-content-center align-items-center">
                                <i class="uil uil-estate fs-4 me-2 card-icon"></i>
                                <h1 class="fs-3 mb-0 nombreCabania">
                                    {{ $amenity->name }}
                                </h1>
                            </div>
                            @if(isset($amenity->amenities) && isset($amenity->amenities[0]) && false)
                                <span class="fs-5">({{ $amenity->amenities[0]->specifications }})</span>
                            @endif

                            <span class="fs-5">({{ $amenity->capacity }} Personas)</span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        </div>
        
    <style>
        .listaItems{
            height: 80dvh;
        }

        @media screen and (max-width: 768px) {
            .listaItems{
                height: auto;
            }
        }
    </style>

        <footer class="w-100 px-lg-5 py-5 footerNew bg-dark text-light" style="flex-shrink: 0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <h4 class="fw-bold text-uppercase mb-3" style="font-family: 'Oswald'; color: #04A39E;">Huitzilcalli</h4>
                        <p class="small text-secondary">Ofrecemos una experiencia única de descanso y conexión con la naturaleza en Aguascalientes. Tu bienestar es nuestra prioridad.</p>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h4 class="fw-bold text-uppercase mb-3" style="font-family: 'Oswald';">Navegación</h4>
                        <ul class="list-unstyled small">
                            <li><a href="#hero-section" class="text-secondary text-decoration-none">Inicio</a></li>
                            <li><a href="#cabins-section" class="text-secondary text-decoration-none">Nuestras Cabañas</a></li>
                            <li><a href="#promotions-section" class="text-secondary text-decoration-none">Ofertas Especiales</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-4">
                        <h4 class="fw-bold text-uppercase mb-3" style="font-family: 'Oswald';">Síguenos</h4>
                        <div class="d-flex">
                            <a href="https://facebook.com/{{ $user->facebook }}" target="_blank" class="btn btn-outline-light btn-icon rounded-circle me-2" style="width: 2.5rem; height: 2.5rem;">
                                <i class="uil uil-facebook-f"></i>
                            </a>
                            <a href="https://instagram.com/{{ $user->instagram }}" target="_blank" class="btn btn-outline-light btn-icon rounded-circle me-2" style="width: 2.5rem; height: 2.5rem;">
                                <i class="uil uil-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <hr style="border-color: rgba(255,255,255,0.1)">
                <div class="text-center small text-secondary mt-3">
                    <p>&copy; {{ date('Y') }} Cabañas Huitzilcalli. Todos los derechos reservados.</p>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection

@section('modal')
<!-- More info Modal -->
<div class="modal fade" id="more-info" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Más Información</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-evenly" id="info-gallery">
                    <div class="form-text d-flex" id="basic-addon4"><i class="uil uil-info-circle me-1"></i>
                        <p>Haz clic en la imagen para visualizarla en pantalla completa.</p>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill"
                            style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/1.webp' );">
                            <a class="flex-fill"
                                style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;"
                                href="/resources/img/1.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill"
                            style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/2.webp' );">
                            <a class="flex-fill"
                                style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;"
                                href="/resources/img/2.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill"
                            style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/3.webp' );">
                            <a class="flex-fill"
                                style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;"
                                href="/resources/img/3.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill"
                            style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/4.webp' );">
                            <a class="flex-fill"
                                style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;"
                                href="/resources/img/4.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-3">
                        <div class="w-100 overflow-hidden d-flex flex-fill"
                            style="border-radius: 0.75rem; overflow: hidden; background-position: center; background-repeat: no-repeat; background-size: cover; background-image: url( '/resources/img/5.webp' );">
                            <a class="flex-fill"
                                style="border-radius: 0.75rem; overflow: hidden; display: flex; border: 0px solid white; aspect-ratio: 1/1;"
                                href="/resources/img/5.webp" data-pswp-width="1080" data-pswp-height="1080">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    let timeoutId = null;
    const documentHeight = () => {
        clearTimeout(timeoutId); // avoid execution of previous timeouts
        timeoutId = setTimeout(() => {
            const doc = document.documentElement;
            doc.style.setProperty('--doc-height', `${window.innerHeight}px`)
        }, 200);
    };
    window.addEventListener('resize', documentHeight);
    documentHeight();
</script>
@endsection