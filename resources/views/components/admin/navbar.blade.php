<nav class="flex flex-col px-8 lg:px-36 border-b-2 border-b-secondary border-opacity-35 bg-white"> 
    <div class="flex items-center justify-between gap-x-5 py-9">
        <div class="flex items-center gap-x-3">
            <h1 class="text-2xl font-medium text-secondary">
                <a href="{{ route('dashboard') }}">
                    Kelulusan
                </a>
            </h1>
            <a href="{{ route('setting') }}" class="hidden lg:block">
                <img src="{{ asset('HiCog.svg') }}" alt="">
            </a>
        </div>
        <button id="burger_button" type="button" class="block lg:hidden">
            <img src="{{ asset('HiOutlineViewList.svg') }}" alt="">
        </button>
        <div class="hidden lg:flex items-center gap-x-12">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-x-2.5">
                @if (request()->is('dashboard') || request()->is('siswa*'))
                    <img src="{{ asset('HiHomeActive.svg') }}" alt="">
                    <p class="text-primary text-base font-semibold">Dashboard</p>
                @else
                    <img src="{{ asset('HiHome.svg') }}" alt="">
                    <p class="text-[#8A8EA8] text-base font-semibold">Dashboard</p>
                @endif
            </a>
            <a href="{{ route('user') }}" class="flex items-center gap-x-2.5">
                @if (request()->is('user*'))
                    <img src="{{ asset('HiUsersActive.svg') }}" alt="">
                    <p class="text-primary text-base font-semibold">User</p>
                @else
                    <img src="{{ asset('HiUsers.svg') }}" alt="">
                    <p class="text-[#8A8EA8] text-base font-semibold">User</p>
                @endif
            </a>
            <a href="{{ route('logout') }}" class="flex items-center gap-x-2.5 bg-heart border border-heart bg-opacity-20 py-2 px-5 rounded-md">
                <p class="text-heart text-base font-semibold">Logout</p>
            </a>
        </div>
    </div>
    <div class="hidden lg:hidden w-full pb-7" id="mobile_menu">
        <ul class="space-y-3">
            <li class="text-lg font-semibold py-2 px-4 rounded-md {{ request()->is('dashboard') || request()->is('siswa*') ? 'bg-primary bg-opacity-10 border border-primary text-primary' : 'bg-mist' }}">
                <a href="{{ route('dashboard') }}" class="block">
                    Dashboard
                </a>
            </li>
            <li class="text-lg font-semibold py-2 px-4 rounded-md {{request()->is('user*') ? 'bg-primary bg-opacity-10 border border-primary text-primary' : 'bg-mist' }}">
                <a href="{{ route('user') }}" class="block">
                    User
                </a>
            </li>
            <li class="text-lg font-semibold py-2 px-4 rounded-md {{ request()->is('setting') ? 'bg-primary bg-opacity-10 border border-primary text-primary' : 'bg-mist' }}">
                <a href="{{ route('setting') }}" class="block">
                    Setting
                </a>
            </li>
            <li class="text-center text-lg font-semibold py-2 px-4 rounded-md bg-heart bg-opacity-10 border border-heart text-heart">
                <a onclick="return confirm('Apakah anda yakin ingin logout?')"  href="{{ route('logout') }}" class="block">
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>