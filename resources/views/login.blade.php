
@extends('components.initial')
@section('main-content')
{{-- Start: Flash Message ketika login gagal --}}
  @if (session('loginFailed'))
      <div id="alert-2" class="flex w-[50%] mx-auto items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:text-red-400" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
          {{ session('loginFailed') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:text-red-400" data-dismiss-target="#alert-2" aria-label="Close">
          <span class="sr-only">Close</span>
          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
          </svg>
        </button>
      </div>
  @endif
  
{{-- End --}}
  <div class="w-[80%] mx-auto flex flex-col justify-center items-center mt-[4rem]">
      <h1 class="font-bold text-2xl">Silahkan Login !</h1>
      <form action="{{ route('login.handle') }}" method="POST" class="w-full mx-auto">
          @csrf
        <div class="mb-5">
          <label for="username" class="block mb-2 text-sm font-medium">Username :</label>
          <input type="text" id="username" name="username" class="bg-gray-50 border text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Masukkan namamu..." value="{{ old('username') }}" >
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password :</label>
          <input type="password" id="password" name="password" class="bg-gray-50 border text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
        </div>
        <div class="mb-5 text-xs">
          <p>Belum Punya Akun ? <a href="/register" class="text-blue-600">Daftar !</a></p>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
      </form>
  </div>
@endsection