@extends('components.initial')
@section('main-content')
    <div class="w-[85%] mx-auto mt-[5rem] font-inter">
        <h1 class="font-poetsen text-[35px] text-center mb-[3rem]">Pilihan Kota !</h1>
        <form action="{{ route('daftar-kota') }}" method="get" class="mx-auto my-6 border w-[20rem] flex justify-between items-center font-inter pl-4">
            <input type="text" name="search-kota" placeholder="Cari kota..." class="outline-none">
            <button type="submit" class="px-4 py-2 bg-slate-200 text-xs ">Cari</button>
        </form>
        {{-- Start: Container Card --}}
        <div class="flex items-center justify-center flex-wrap w-full gap-3">
            @foreach ($daftar_kota as $kota)
            <div class="flex flex-col items-center w-[180px] p-3 shadow-lg rounded-md">
                <img src="/assets/img/landmark/{{ $kota->image }}" alt="{{ $kota->nama_kota }}" class="w-[50%]">
                <h1 class="font-poetsen text-[15px] text-center">{{ $kota->nama_kota }}</h1>
                <a href="{{ route('daftar-wisata', ['id' => $kota->id]) }}" class="text-white w-[100px] bg-[#0085FF] rounded-sm text-[10px] font-semibold px-5 py-1 text-center mt-2">Details</a>
            </div>
            @endforeach
        </div>
        {{-- End: Container Card --}}
    </div>
@endsection