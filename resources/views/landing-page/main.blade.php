@extends('components.initial')
@section('main-content')
    {{-- Start: Headline ( Hero Section )  --}}
    <div class="w-full h-screen flex flex-col justify-center items-center bg-[url('/assets/img/backgrounds/bg-hero.png')] bg-cover bg-center relative">
        <div class="w-[95%] flex flex-col items-center">
            <h2 class="text-[42px] md:text-[48px] xl:text-[60px] font-poetsen text-white -mb-4 xl:-mb-7">Temukan</h2>
            <h1 class="text-[58px] md:text-[80px] xl:text-[90px] font-poetsen text-white">Destinasi Wisata</h1>
            <p class="font-inter font-semibold text-[14px] md:max-w-[588px] xl:max-w-[700px] text-center text-white opacity-[80%]">Wisataku.id adalah sebuah website penyedia layanan Traveling dimana anda bisa memilih tempat Wisata yang berada di seluruh wilayah penjuru Indonesia dengan lebih dari puluhan Destinasi puluhan Destinasi Wisata dari 30 provinsi</p>
            @guest
                <a href="{{ route('login.form') }}" class="w-[180px] md:w-[290px] hover:bg-white hover:text-black mt-8 border border-white bg-transparent text-white text-xs px-3 text-center py-2">Pesan Tiket</a>
                @endguest
            @auth    
                <a href="{{ route('daftar-wisata') }}" class="w-[180px] md:w-[290px] hover:bg-white hover:text-black mt-8 border border-white bg-transparent text-white text-xs px-3 text-center py-2">Pesan Tiket</a>
            @endauth
        </div>

        {{-- Start: Data --}}
        <div class="flex justify-center items-center gap-4 xl:gap-14 text-white font-inter font-semibold absolute bottom-8">
            <div class="flex items-center gap-1 text-xs">
                <img src="/assets/icon/destination.svg" alt="destinasi" class="w-[40px] xl:w-[60px]">
                <p class="text-[13px] xl:text-[17px]">Destinasi <br> {{ $destinasi->count() }}+</p>
            </div>
            <span class="w-[2px] opacity-70 bg-white h-[50px]"></span>
            <div class="flex items-center gap-1 text-xs">
                <img src="/assets/icon/location-white.svg" alt="destinasi" class="w-[40px] xl:w-[60px]">
                <p class="text-[13px] xl:text-[17px]">Kota <br> {{ $kota->count() }}+</p>
            </div>
            <span class="w-[2px] opacity-70 bg-white h-[50px]"></span>
            <div class="flex items-center gap-1 text-xs">
                <img src="/assets/icon/user.svg" alt="destinasi" class="w-[40px] xl:w-[60px]">
                <p class="text-[13px] xl:text-[17px]">Pengguna <br> {{ $pengguna->count() }}+</p>
            </div>
        </div>
        {{-- End: Data --}}
    </div>
    {{-- End --}}

    {{-- Start: Wisata Terkini --}}
    <div class="w-[95%] mx-auto">
        <h1 class="font-poetsen text-center mt-[5rem] text-3xl text-[#525252] mb-[3rem]">Wisata Terkini !</h1>
        {{-- Start: Container Card --}}
        <div class="flex justify-center items-center md:items-start flex-wrap font-inter mx-auto gap-5">
            {{-- Start: Card --}}
            @foreach ($top_wisata as $wisata)
                <div class="w-[95%] md:w-[380px] flex flex-col mx-auto border border-[#A9A9A9] border-opacity-50 shadow-lg pb-4">
                    <img src="/assets/img/{{ $wisata->image }}" alt="destinasi" class="w-full">
                    <h1 class="font-poetsen text-[30px] px-3">{{ $wisata->nama }}</h1>
                    <div class="w-[95%] px-3 flex justify-between items-center">
                        <p class="text-[15px] text-green-500">Rp {{ $wisata->harga_tiket }}</p>
                        <div class="flex items-center gap-1">
                            <img src="/assets/icon/location-red.svg" alt="lokasi" class="w-5">
                            <p class="font-semibold text-[15px]">{{  $wisata->kota->nama_kota  }}</p>
                        </div>
                    </div>
                    <a href="{{ route('details', ['id' => $wisata->id]) }}" class="text-white ml-2 font-medium w-[120px] bg-[#0085FF] rounded-md text-xs px-5 py-2 text-center mt-5">Details</a>
                </div>
            @endforeach
            {{-- End: Card --}}
        </div>
        {{-- End: Container Card --}}
    </div>
    {{-- End: Wisata Terkini --}}

    {{-- Start: Footer --}}
    @include('components.footer')
    {{-- End --}}


@endsection