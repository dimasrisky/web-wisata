@extends('components.initial')
@section('main-content')
    <div class="w-[80%] mx-auto flex flex-col justify-center items-center mt-[4rem]">
        <h1 class="font-bold text-2xl">Form Pemesanan Tiket</h1>
        <form action="{{ route('pesan.store') }}" method="POST" class="mx-auto w-full">
            @csrf
            <div class="mb-5">
                <label for="pemilik" class="block mb-2 text-sm font-medium text-black">Pemilik : </label>
                <input type="hidden" name="pemilik" id="pemilik" value="{{ auth()->user()->nama }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <input type="text" value="{{ auth()->user()->nama }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
            </div>
            <div class="mb-5">
                <label for="wisata" class="block mb-2 text-sm font-medium text-gray-900">Destinasi :</label>
                <input type="hidden" name="wisata" id="wisata" value="{{ $data_wisata->nama }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <input type="text" value="{{ $data_wisata->nama }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
            </div>
            <div class="mb-5">
                <label for="harga_satuan" class="block mb-2 text-sm font-medium text-black">Harga/Satuan :</label>
                <input type="hidden" id="harga_satuan" name="harga_satuan" value="{{ $data_wisata->harga_tiket }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <input type="text" value="{{ $data_wisata->harga_tiket }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
            </div>
            <div class="mb-5">
                <label for="qty" class="block mb-2 text-sm font-medium text-black">Jumlah Tiket :</label>
                <input type="number" id="qty" name="jumlah_tiket" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-5">
                <label for="total" class="block mb-2 text-sm font-medium text-black">Total :</label>
                <input type="text" id="total" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" disabled>
            </div>
            <button type="submit" name="submit" value="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cetak Tiket !</button>
        </form>
    </div>

    <script>
        let jumlahTotal = () => {
            let totalField = document.getElementById('total')
            let quantityTiket = document.getElementById('qty').value
            let hargaSatuan = {{ $data_wisata->harga_tiket }}
    
            totalField.setAttribute('value', quantityTiket * hargaSatuan)
        }
        setInterval(() => {
           jumlahTotal()
        }, 1);
    </script>
@endsection