@php
    $flag = str_contains(Request::url(),'caba%C3%B1a') || str_contains(Request::url(),'jacuzzi');
@endphp

<nav id="custom-nav" class="navbar custom-nav fixed-top navbar-expand-md @if($flag) custom-secondary @endif">
    @php
        // var_dump(Request::url());
        // var_dump(str_contains(Request::url(),'caba%C3%B1a'));
    @endphp
    <div class="container-fluid px-5 py-2 d-flex">
        <a class="navbar-brand d-flex alig-items-center m-auto" href="{{ url('/') }}">
            <img src="{{ __('/resources/img/logo-sm.webp') }}" data-src="{{ __('/resources/img/logo-sm.webp') }}" alt="{{ config('app.name', 'APP_NAME') }}" class="lazyload d-inline-block align-text-top me-2" style="@if($flag) opacity: 1 !important; @endif">
            <!-- {{ config('app.name', 'APP_NAME') }} -->
        </a>

        <!-- 
        <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-none" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"></a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#cabaña-1">{{ __('Villa Magnolia') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#cabaña-2">{{ __('Villa Laurel') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#cabaña-3">{{ __('Villa Jacaranda') }}</a>
                </li>
            </ul>
        </div> 
        -->
    </div>
</nav>
    
<script type="text/javascript">
    const navbar =  document.querySelector('#custom-nav');
    document.addEventListener('DOMContentLoaded', () => {
        window.addEventListener('scroll', () => {
            if(window.scrollY > 50) {
                navbar.classList.add('nav-scrolled');
            }else if(window.scrollY <= 50){
                navbar.classList.remove('nav-scrolled');
            }
        })
    })
    
</script>