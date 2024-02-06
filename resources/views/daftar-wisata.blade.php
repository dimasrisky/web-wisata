@extends('components.initial')
@section('main-content')
    <div class="max-w-screen-xl mx-auto mt-[2rem]">
        {{-- Flash Message ketika berhasil Login --}}
        @if (session('success'))
            <div id="alert-3" class="flex w-[50%] mx-auto items-center p-4 mb-4 mt-14 text-green-800 rounded-lg bg-green-50 dark:text-green-400" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:text-green-400" data-dismiss-target="#alert-3" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
        @endif

        {{-- Main Content --}}
        <h1 class="text-center text-3xl font-bold mb-5 mt-[5rem]">Pilih Destinasi Wisata Anda !</h1>
        <form action="{{ route('daftar-wisata') }}" method="get" class="mx-auto my-6 border w-[20rem] flex justify-between items-center font-inter pl-4">
            <input type="text" name="search-wisata" placeholder="Cari Wisata..." class="outline-none">
            <button type="submit" class="px-4 py-2 bg-slate-200 text-xs ">Cari</button>
        </form>
        <div class="flex flex-wrap gap-5 justify-center">
            @foreach ($data_wisata as $wisata)
                <div class="w-[20rem] bg-white border border-gray-200 rounded-lg shadow ">
                    <a href="#">
                        <img class="w-full" src="/assets/img/{{ $wisata->image }}" loading="lazy" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900"> {{ $wisata->nama }} </h5>
                        </a>
                        <div class="flex justify-between">
                            <p class="font-semibold text-green-500 my-2">Rp {{ $wisata->harga_tiket }}</p>
                            <div class="flex items-center">
                                <img src="/assets/icon/location-red.svg" class="w-[1.5rem]">
                                <p>{{ $wisata->kota->nama_kota }}</p>
                            </div>
                        </div>
                        <a href="{{ route('details', ['id' => $wisata->id]) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            @auth
                                Pesan
                            @endauth
                            @guest
                                Details
                            @endguest
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection