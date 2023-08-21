<!DOCTYPE html>
<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<link rel="icon" href="{{ url('favicon.ico') }}">
<style>
    html {
        scroll-behavior: smooth;
    }
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
    body {
        background: white;
        color: #222222;
        margin: auto;
    }
    .bg-image {
      opacity: 0.4;
    }
    .gradient {
        background: linear-gradient(90deg, #38393B 0%, #38393B 100%);
      }

    .gradientt {
        background: linear-gradient(90deg, #141D26 0%, #141D26 100%)
    }
</style>

@include('components.navbar')

   <body>
                {{ $slot }}
   </body>

@include('components.footer')


