@extends('components.initial')
@section('main-content')
    <div class="flex flex-col mx-auto bg-white border border-gray-200 rounded-lg shadow w-[95%] h-screen justify-center items-center hover:bg-gray-100">
        <img class="w-full rounded-t-lg md:rounded-none md:rounded-s-lg" src="{{ asset('storage/img/' . $data_wisata->image ) }}" alt="">
        <div class="w-full p-4 leading-normal">
            <h5 class="mb-2 text-3xl font-bold tracking-tight text-black">{{ $data_wisata->nama }}</h5>
            <p class="mb-3 font-normal text-black">{{ $data_wisata->deskripsi }}</p>
            @auth
                <a href="{{ route('pesan.show', ['id' => $data_wisata->id]) }}" class="px-8 py-2 bg-orange-500 text-xs text-white font-semibold w-[10rem] rounded-md">Pesan Sekarang !</a>
            @endauth
        </div>
    </div>
@endsection
