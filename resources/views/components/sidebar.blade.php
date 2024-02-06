<aside class=" w-64 h-screen fixed left-0 transition-transform -translate-x-full sm:translate-x-0">
    <div class="h-full px-3 py-4 overflow-y-auto bg-blue-400">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('logout') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-100 ">
                    <img src="/assets/icon/logout.svg" class="w-[2rem]">
                    <span class="ms-3" class="flex-grow-1">Logout</span>
                </a>
                <a href="{{ route('wisata.index') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-100 ">
                    <img src="/assets/icon/list.svg" class="w-[2rem]">
                    <span class="ms-3" class="flex-grow-1">Daftar Wisata</span>
                </a>
                <a href="{{ route('wisata.create') }}" class="flex items-center p-2 text-white rounded-lg hover:bg-gray-100 ">
                    <img src="/assets/icon/add.svg" class="w-[2rem]">
                    <span class="ms-3" class="flex-grow-1">Tambah Wisata</span>
                </a>
            </li>
        </ul>
    </div>
</aside>