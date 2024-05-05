<nav class="flex items-center justify-between gap-x-5 bg-bg-200 bg-opacity-70 border-b-2 border-b-black border-opacity-20 py-9 px-4 lg:px-36">
    <h1 class="font-bold text-secondary">
        <a href="{{ route('home') }}">
            <div class="flex items-center gap-x-2">
                <img src="{{ asset('logo_sman1_kasokandel.png') }}" alt="" class="size-10 lg:size-14">
                <div class="space-y-1 lg:space-x-0">
                    <h1 class="text-sm lg:text-lg font-medium lg:font-semibold">{{ App\Models\Setting::first()->nama_sekolah }}</h1>
                    <p class="text-xs lg:text-sm font-extralight lg:font-light">Pengumuman Kelulusan 2024</p>
                </div>
            </div>
        </a>
    </h1>
    <div class="flex items-center gap-x-12">
        <a href="{{ route('logout') }}" class="flex items-center gap-x-2.5 bg-heart border border-heart bg-opacity-20 py-2 lg:py-2 px-2.5 lg:px-5 rounded-md">
            <p class="text-heart text-sm lg:text-base font-normal lg:font-medium">Logout</p>
        </a>
    </div>
</nav>