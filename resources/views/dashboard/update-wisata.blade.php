<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/assets/icon/logo.svg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{$title}}</title>
</head>
<body>
    @include('components.sidebar')
    <div class="flex justify-center items-center w-screen h-screen">
        <form action="{{ route('wisata.update', ['wisatum' => $data_wisata->id]) }}" method="post" enctype="multipart/form-data" class="mx-auto w-[50%]">
            @method('put')
            @csrf
            <h1 class="font-bold text-2xl mb-[2rem] text-center">Edit Wisata !</h1>
            <input type="hidden" name="id" value="{{ $data_wisata->id }}">
            <div class="mb-5">
                <label for="nama_wisata" class="block mb-2 text-sm font-medium text-gray-900">Nama Wisata :</label>
                <input type="text" id="nama_wisata" name="nama_wisata" value="{{ $data_wisata->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama Wisata..." required>
            </div>
            <div class="mb-5">
                <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi :</label>
                <input type="text" id="deskripsi" name="deskripsi" value="{{ $data_wisata->deskripsi }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-5">
                <label for="kota" class="block mb-2 text-sm font-medium text-gray-900">Kota :</label>
                <select id="kota" name="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600">
                    <option value="{{ $data_wisata->kota->id }}">{{ $data_wisata->kota->nama_kota }}</option>
                    @foreach ($data_kota as $kota)
                        <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="harga_tiket" class="block mb-2 text-sm font-medium text-gray-900">Harga Tiket :</label>
                <input type="number" id="harga_tiket" name="harga_tiket" value="{{ $data_wisata->harga_tiket }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Harga Tiket Wisata..." required>
            </div>
            <div class="mb-5">
                <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Gambar :</label>
                <input type="hidden" name="oldImage" value="{{ $data_wisata->image }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                <input type="file" id="image" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600 dark:placeholder-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                <img src="{{asset('storage/img/' . $data_wisata->image ) }}" alt="gambar-wisata" class="mt-5 w-[20rem]">
            </div>
            <button type="submit" name="submit" value="submit" class="text-white w-full bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masukkan Data</button>
        </form>
    </div>
</body>
</html>
