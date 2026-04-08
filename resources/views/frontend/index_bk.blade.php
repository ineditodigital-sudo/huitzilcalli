@extends('frontend.layouts.app')

@section('content')

@php
    // var_dump($cabins);
@endphp
 
    <div class="container-fluid">
        <section style="min-height: 100vh;" class="main-section">
            <div class="row index-section" style="min-height: 100vh;">
                <div class="col-lg-7 text-center d-flex flex-column justify-content-center align-items-center index-section-2">
                    <div class="row w-100 mb-5">
                        <div class="col-4 col-img">
                            <img class="img-fluid w-100" src="{{ __('https://huitzilcalli.com/resources/img/logo-lg.webp') }}" alt="Huitzilcalli">
                        </div>
                        <div class="col-8 d-flex flex-column justify-content-evenly">
                            <h1 class="fw-bolder text-start text-uppercase mb-0 index-main">Cabañas</h1>
                            <h1 class="text-uppercase text-start fw-lighter index-secondary">Los Laureles</h1>
                        </div>
                    </div>
                    
                    <div class="mt-3 w-100 d-flex align-items-center justify-content-center mb-3">
                        <div class="bg-primary" style="height: 0.35rem; width: 40%; border-radius: 5rem; overflow: hidden"></div>
                    </div>
                    
                    <p class="my-4 mt-2 mb-5 fs-4">Descubre las encantadoras cabañas Los Laureles. Disfruta de la naturaleza y relájate en un refugio sereno. ¡Reserva ahora y vive una experiencia única!</p>
                    <a class="btn btn-lg btn-outline-primary" href="#cabaña-1">Ver Cabañas</a>
                </div>
                <div class="col-lg-5 text-center position-relative">
                    <img class="img-fluid position-absolute" id="b1" src="{{ __('/resources/img/b1.webp') }}" alt="Banner 1" style="filter: drop-shadow(1rem 4rem 2rem #33b78666);">
                    <img class="img-fluid position-absolute" id="b2" src="{{ __('/resources/img/b2.webp') }}" alt="Banner 2" style="filter: drop-shadow(1rem 4rem 2rem #f4a83e66);">
                    <img class="img-fluid position-absolute" id="b3" src="{{ __('/resources/img/b3.webp') }}" alt="Banner 3" style="filter: drop-shadow(0.5rem 2rem 2rem #33b78666);">
                </div>
            </div>
        </section>

        @foreach ($cabins as $i => $cabin)

            @if(count($cabin->gallery) > 0)
                @php
                    $auxImg = [];
                    foreach($cabin->gallery as $p => $photo){
                        if(count($auxImg) >= 5){
                            //return;
                        }else{
                            array_push($auxImg,$photo);
                        }
                    }
    
                    if(count($auxImg) <= 5 && count($auxImg) > 0) {
                        while(count($auxImg) <= 5){
                            array_push($auxImg,$auxImg[0]);    
                        }
                    }
                @endphp
            @endif

            <section class="cabaña-section" id="cabaña-{{ $i+1 }}">
                <div class="row {{ ($i+1)%2==0 ? 'flex-row-reverse text-secondary' : 'bg-secondary text-light' }} justify-content-evenly overflow-hidden" style="padding: 4rem 0;">
                    @if(count($cabin->gallery) > 0)
                    <div class="col-xl-4 col-lg-5 col-md-6 text-center d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex flex-column w-100 justify-content-center align-items-center cabin-gallery">
                            <a style="border-radius: 1rem; overflow: hidden; max-height: 70%; height: auto; aspect-ratio: 1/1.2; display: flex; border: 0px solid white;" href="/public/{{ $auxImg[0]->route }}" class="w-75" data-pswp-width="{{ $auxImg[0]->width }}" data-pswp-height="{{ $auxImg[0]->height }}">
                                <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public/{{ $auxImg[0]->route }}" alt="Banner">
                            </a>
                            
                            <div class="d-flex flex-wrap w-75 justify-content-between py-3">
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public/{{ $auxImg[1]->route }}" data-pswp-width="{{ $auxImg[1]->width }}" data-pswp-height="{{ $auxImg[1]->height }}">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public/{{ $auxImg[1]->route }}" alt="Banner">
                                </a>
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public/{{ $auxImg[2]->route }}" data-pswp-width="{{ $auxImg[2]->width }}" data-pswp-height="{{ $auxImg[2]->height }}">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public/{{ $auxImg[2]->route }}" alt="Banner">
                                </a>
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public/{{ $auxImg[3]->route }}" data-pswp-width="{{ $auxImg[3]->width }}" data-pswp-height="{{ $auxImg[3]->height }}">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public/{{ $auxImg[3]->route }}" alt="Banner">
                                </a>
                                <a style="border-radius: 0.75rem; overflow: hidden; width: 20%; display: flex; border: 0px solid white; aspect-ratio: 1/1;" href="/public/{{ $auxImg[4]->route }}" data-pswp-width="{{ $auxImg[4]->width }}" data-pswp-height="{{ $auxImg[4]->height }}">
                                    <img style="object-fit: cover;" class="img-fluid bg-light w-100" src="/public/{{ $auxImg[4]->route }}" alt="Banner">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="col-xl-4 col-lg-5 col-md-6 text-start d-flex flex-column justify-content-center position-relative">
                        <div class="bg-primary-gradient{{ ($i+1)%2==0 ? '2' : '' }} position-absolute top-0 {{ ($i+1)%2==0 ? 'end-0 text-end' : 'start-0' }} custom-shadow py-3 px-5 mb-5" style="width: 300%; margin-left: -2rem;">
                            <h1 class="fw-bolder text-uppercase text-dark p-0 mb-0">{{ $cabin->name }}</h1>
                        </div>
                        <p class="fs-5" style="margin-top: {{($i+1)%2==0 ? '7' : '5' }}rem;">{{ $cabin->description }}</p>
                        <h4 class="mt-4 text-uppercase px-2" style="font-weight: 300; letter-spacing: 0.5rem">Incluye</h4>
                        <div class="d-flex align-items-center justify-content-start mb-4">
                            <div class="bg-primary" style="height: 0.20rem; width: 40%; border-radius: 5rem; overflow: hidden"></div>
                        </div>

                        <div class="row">
                            @foreach ($cabin->amenities as $amenitie)
                                <div class="col-lg-{{ (strlen($amenitie->title) >= 25 || strlen($amenitie->specifications) >= 30) ? '8' : '4' }} col-md-6 mb-3 align-items-center d-flex">
                                    <div class="d-flex">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <span class="{{ ($i+1)%2==0 ? 'text-dark' : 'text-light' }} rounded d-flex justify-content-center align-items-center" style="width: 2.5rem; height: auto; aspect-ratio: 1/1; {{ ($i+1)%2==0 ? 'background: hsla(95,6%,15%,0.1);' : 'background: #fff4;' }}">
                                                <i class="p-0 m-0 uil uil-{{ $amenitie->icon }} fs-4"></i>
                                            </span>    
                                        </div>
                                        <div class="d-flex w-100 flex-column ps-3 d-flex justify-content-center">
                                            <h6 class="m-0 fw-bold">{{ $amenitie->title }}</h6>
                                            @if ($amenitie->specifications)
                                                <p class="m-0" style="color: {{ ($i+1)%2==0 ? '#888' : '#bbb' }}">{{ $amenitie->specifications }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <div class="form-group d-flex mt-4">
                            <a href="{{ route('detalles',['slug' => $cabin->slug]) }}" class="btn btn-warning">Ver Detalles</a>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>
@endsection

@section('script')
    <script type="module">
        import PhotoSwipeLightbox from "{{ __('https://huitzilcalli.com/resources/js/photoswipe-lightbox.esm.js') }}";
        import PhotoSwipe from "{{ __('https://huitzilcalli.com/resources/js/photoswipe.esm.js') }}";

        const lightbox = new PhotoSwipeLightbox({
            gallery: '.cabin-gallery',
            children: 'a',
            pswpModule: PhotoSwipe
        });

        lightbox.init();
    </script>
@endsection