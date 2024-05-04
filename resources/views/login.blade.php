<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}"></script> --}}
</head>
<body>
    <main class="flex h-screen overflow-hidden">
        <div style="background-image: url({{ asset('luke-miller-kf0FdiZy0uA-unsplash.jpg') }})" class="hidden lg:block basis-2/5 bg-cover bg-center">
            <div class="flex flex-col justify-between size-full p-12">
                <button class="flex items-center gap-x-3">
                    <img src="{{ asset('HiOutlineViewList.svg') }}" alt="" class="size-8">
                    <p class="text-white text-2xl font-medium">Menu</p>
                </button>
                <h1 class="text-center text-white text-3xl font-bold">Kelulusan</h1>
                <div class="flex items-center justify-center gap-x-4">
                    <img src="{{ asset('HiOutlineViewList.svg') }}" alt="">
                    <img src="{{ asset('HiOutlineViewList.svg') }}" alt="">
                    <img src="{{ asset('HiOutlineViewList.svg') }}" alt="">
                </div>
            </div>
        </div>
        <div class="lg:basis-3/5 flex items-center justify-center w-full mx-8 lg:mx-0">
            <form method="POST" action="{{ route('signin') }}" class="w-full max-w-xl">
                @csrf
                @method('POST')
                <h2 class="text-secondary text-3xl font-bold">Login</h2>
                <p class="text-secondary font-medium mt-2">Silahkan login terlebih dahulu</p>
                <div class="space-y-6 mt-14">
                    <div>
                        <div class="relative">
                            <img src="{{ asset('HiUser.svg') }}" id="nisIcon" alt="" class="absolute top-1/2 left-[18px] -translate-y-1/2">
                            <input type="text" name="nis" id="nis" class="bg-mist py-4 pr-4 pl-14 rounded-[10px] focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" autofocus placeholder="Nomor Induk Siswa">
                        </div>
                        @error('nis') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <div class="relative">
                            <img src="{{ asset('HiOutlineKey.svg') }}" id="passwordIcon" alt="" class="absolute top-1/2 left-[18px] -translate-y-1/2">
                            <input type="password" name="password" id="password" class="bg-mist py-4 pr-4 pl-14  rounded-[10px] focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Password">
                        </div>
                        @error('password') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
                <button type="submit" class="flex items-center gap-x-12 bg-primary rounded-[10px] p-4 mt-6">
                    <span class="text-white text-lg font-bold">Next</span>
                    <img src="{{ asset('HiOutlineChevronRight.svg') }}" alt="">
                </button>
                <div class="h-0.5 w-full bg-bg-200 my-7"></div>
                <a href="https://wa.me/{{ App\Models\Setting::first()->no_hp }}" target="_blank" class="text-black hover:text-primary hover:underline">
                    Lupa password?
                </a>
            </form>
        </div>  
    </main>
</body>
<script>
    const nis = document.getElementById('nis')
    const password = document.getElementById('password')

    const nisIcon = document.getElementById('nisIcon')
    const passwordIcon = document.getElementById('passwordIcon')

    nis.addEventListener('blur', () => {
        nisIcon.src = "{{ asset('HiUser.svg') }}"
    })

    nis.addEventListener('focus', () => {
        nisIcon.src = "{{ asset('HiUserFocus.svg') }}"
    })

    password.addEventListener('blur', () => {
        passwordIcon.src = "{{ asset('HiOutlineKey.svg') }}"
    })

    password.addEventListener('focus', () => {
        passwordIcon.src = "{{ asset('HiOutlineKeyFocus.svg') }}"
    })
</script>
</html>