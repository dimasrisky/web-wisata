@extends('components.initial')
@section('main-content')    
    <div class="w-[80%] mx-auto flex flex-col justify-center items-center mt-[4rem]">
        <h1 class="font-bold text-2xl">Silahkan Register !</h1>
        <form action="{{ route('store.user') }}" method="POST" class="mx-auto w-full">
            @csrf
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-black">Username : </label>
                <input type="text" id="username" name="username" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan nama..." required>
            </div>
            <div class="mb-5">
                <label for="username" class="block mb-2 text-sm font-medium text-black">Email :</label>
                <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ex: asepgawul34@gmail.com" required>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-black">Password :</label>
                <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-5">
                <label for="repeat-password" class="block mb-2 text-sm font-medium text-black">Repeat password :</label>
                <input type="password" id="repeat-password" name="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-5">
                <p class="text-xs">Sudah Punya Akun ? <a href="/" class="text-blue-600">Login</a></p>
            </div>
            <button type="submit" name="submit" value="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Daftar Sekarang !</button>
        </form>
    </div>
@endsection