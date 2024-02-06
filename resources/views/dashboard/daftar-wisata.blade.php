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
    <div class="overflow-x-auto flex flex-col items-center ml-[10rem]">
        {{-- Start: Flash Message ketika berhasil Login --}}
        @if (session('success'))
            <div id="alert-3" class="flex items-center w-[50%] mx-auto p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:text-green-400" role="alert">
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
        {{-- End --}}
    
        {{-- Start: Daftar Wisata --}}
        <h1 class="font-bold text-4xl text-center mb-[2rem]">Daftar Wisata</h1>
        <table class="w-[50rem] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50  dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">id</th>
                    <th scope="col" class="px-6 py-3">Nama Wisata</th>
                    <th scope="col" class="px-6 py-3">Kota</th>
                    <th scope="col" class="px-6 py-3">Harga Tiket</th>
                    <th scope="col" class="px-6 py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_wisata as $wisata)
                    <tr class="bg-white border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $wisata->id }}</th>
                        <td class="px-6 py-4"> {{ $wisata->nama }} </td>
                        <td class="px-6 py-4"> {{ $wisata->kota->nama_kota }}</td>
                        <td class="px-6 py-4">Rp {{ $wisata->harga_tiket }} </td>
                        <td class="px-6 py-4">
                            <div class="flex">
                                <form action="{{ route('wisata.destroy', ['wisatum' => $wisata->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>
                                </form>
                                <a href="{{ route('wisata.edit', ['wisatum' => $wisata->id]) }}" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- End --}}
    </div>
</body>
</html>