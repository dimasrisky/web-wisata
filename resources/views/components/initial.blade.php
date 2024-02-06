<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/assets/icon/logo.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script> 
    <title>{{ $title }}</title>
    <style>
        @font-face {
            font-family: 'Poetsen One';
            src: url('/assets/font/PoetsenOne-Regular.ttf');
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                fontFamily: {
                    'poetsen': ['Poetsen One', 'sans-serif'],
                    'inter': ['Inter', 'sans-serif']
                },
            }
        }
    </script>
</head>
<body>
    {{-- Start: Navbar --}}
    <nav class="bg-white w-full mx-auto xl:w-screen fixed top-0 z-50 xl:px-[3rem] ">
        <div class="w-[95%] flex flex-wrap items-center justify-between mx-auto py-2">
            <a href="#" class="flex items-center gap-2">
                <img src="/assets/icon/logo.svg" class="w-8" alt="Website logo" />
                <span class="text-sm font-poetsen ">Travelingkuy.id</span>
            </a>
            {{-- Start: Nav-Link Desktop --}}
            <div class="hidden md:flex items-center gap-4 text-[12px] font-inter ">
                <a href="{{ route('landing-page') }}" class="font-semibold">Home</a>
                <a href="{{ route('about-page') }}">Tentang Kami</a>
                <a href="{{ route('daftar-wisata') }}">Wisata</a>
                <a href="{{ route('daftar-kota') }}">Kota</a>
            </div>
            {{-- End --}}

            <div class="flex items-center gap-7">
                @auth
                {{-- Start: Profile --}}
                <div class="flex items-center gap-1">
                    <img src="/assets/icon/profile.svg" alt="profile" class="w-6">
                    <h4 class="text-[18px] font-semibold font-inter text-right">{{ auth()->user()->nama }}</h4>
                </div>
                {{-- End: Profile --}}
                @endauth
                {{-- Start: Nav-Link Mobile --}}
                <button type="button" id="nav-menu" class="md:hidden relative">
                    <img src="/assets/icon/hamburger-menu.svg" alt="hamburger-menu" class="w-7">
                    <div class="w-[140px] hidden bg-white font-inter absolute -left-[7rem] top-4 text-left text-xs shadow-md p-4">
                        <div class="mb-5 flex flex-col gap-1">
                            <a href="{{ route('landing-page') }}">Home</a>
                            <a href="{{ route('about-page') }}">Tentang Kami</a>
                            <a href="{{ route('daftar-wisata') }}">Wisata</a>
                            <a href="{{ route('daftar-kota') }}">Kota</a>
                        </div>
                        <a href="{{ route('register.form') }}" class="w-[100%] block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-xs py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</a>
                    </div>
                </button>
                {{-- End --}}
    
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('logout') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Logout</a>
                    @endauth
                    @guest
                        <a href="{{ route('login.form') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</a>
                        <a href="{{ route('register.form') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
    {{-- End --}}

    {{-- Main Content --}}
    @yield('main-content')
    {{-- End --}}

    {{-- Start: Script Untuk Fungsionalitas hamburger menu --}}
    <script>
        let stateClick = false
        const iconHam = document.querySelector('#nav-menu img')
        const navMenu = document.querySelector('#nav-menu div')
        
        iconHam.addEventListener('click', () => {
            stateClick = !stateClick
            iconHam.setAttribute('src', `/assets/icon/${stateClick ? 'close.svg' : 'hamburger-menu.svg' }`)
            navMenu.classList.toggle('hidden')
        })
    </script>
    {{-- End --}}
</body>
</html>