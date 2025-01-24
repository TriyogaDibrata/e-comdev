<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Your site description here">
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <meta name="author" content="Your Name">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs@3.10.0/dist/cdn.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/css/front.css', 'resources/js/front.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <header>
        <x-header></x-header>
    </header>

    <main class="pt-24 min-h-screen">
        {{ $slot }}
    </main>

    <footer>
        {{-- <x-footer></x-footer>  --}}
    </footer>

    @livewireScripts
    @vite('resources/js/front.js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('show-swal', function(data) {
                var data = data[0];
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                    confirmButtonText: 'OK'
                });
            });

            Livewire.on('show-toast', function(data) {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                var data = data[0];
                Toast.fire({
                    icon: data.icon,
                    title: data.title
                });
            });
        });
    </script>
    @stack('js')
</body>

</html>
