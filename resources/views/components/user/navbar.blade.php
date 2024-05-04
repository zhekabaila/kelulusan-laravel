<nav class="flex items-center justify-between gap-x-5 bg-bg-200 bg-opacity-70 border-b-2 border-b-black border-opacity-20 py-9 px-8 lg:px-36">
    <h1 class="text-2xl font-bold text-secondary">
        <a href="{{ route('home') }}">
            Kelulusan
        </a>
    </h1>
    <div class="flex items-center gap-x-12">
        <a href="{{ route('logout') }}" class="flex items-center gap-x-2.5 bg-heart border border-heart bg-opacity-20 py-2 px-5 rounded-md">
            <p class="text-heart text-base font-medium">Logout</p>
        </a>
    </div>
</nav>