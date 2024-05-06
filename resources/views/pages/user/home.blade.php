@extends('components.user.layout')

@section('title', 'Selamat datang ' . $nama)

@section('main')
    <section class="mt-10 lg:mt-20">
            <div class="relative">
                <div class="relative bg-secondary bg-opacity-10 p-7 rounded-md border-2 border-secondary w-full">
                    <h1 class="text-secondary text-2xl lg:text-3xl font-bold leading-9 lg:leading-[50px]">
                        Selamat datang {{ $data->nama ?? '-' }}, 
                        @if (!now()->greaterThanOrEqualTo($target_date_time))
                            <br>
                            Pengumuman Kelulusan Pada {{ Carbon\Carbon::parse($target_date_time)->isoFormat('dddd, D MMMM YYYY') }} pukul {{ Carbon\Carbon::parse($target_date_time)->isoFormat('HH:mm') }}
                        @endif
                    </h1>
                </div>
            </div>
    </section>

    <section class="mt-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-8">
            <div class="bg-bg-200 p-7 lg:p-10 rounded-md col-span-2">
                <div class="flex">
                    <h1 class="flex items-center gap-x-3 text-2xl font-medium rounded-md">
                        Biodata
                    </h1>
                </div>
                <div class="grid grid-cols-1 gap-6 mt-8 overflow-y-auto">
                    <div class="space-y-5">
                        <div>
                            <h2 class="text-base font-bold text-secondary">Nama :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nama ?? '-' }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">NIS :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nis ?? '-' }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">NISN :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nisn ?? '-' }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Tempat, Tanggal Lahir :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->ttl ?? '-' }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Nama Ortu :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nama_ortu ?? '-' }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Konsentrasi Keahlian :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->jurusan ?? '-' }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Rombel :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->kelas ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (now()->greaterThanOrEqualTo($target_date_time))
        <section class="mt-10 lg:mt-20">
            <div class="relative">
                <div class="relative bg-primary bg-opacity-10 p-7 rounded-md border-2 border-primary w-full">
                    <h1 class="text-primary text-2xl lg:text-3xl font-bold leading-9 lg:leading-[50px]">
                        Selamat {{ $data->nama ?? '-' }} 🥳🤩, <br>
                        Ananda Dinyatakan Lulus Dari {{ App\Models\Setting::first()->nama_sekolah ?? '-' }}
                    </h1>
                    <div class="mt-7 lg:mt-5 text-primary text-lg lg:text-xl lg:pr-80">
                        Kami bangga atas kelulusan yang ananda raih, Surat Keterangan Lulus akan di bagikan pada hari Rabu, 08 Mei 2024
                    </div>
                    <div class="flex lg:hidden justify-between mt-7">
                        <img src="{{ asset('confetti.png') }}" alt="" class="size-16 lg:size-24">
                        <img src="{{ asset('confetti.png') }}" alt="" class="size-16 lg:size-24 -scale-x-100">
                    </div>
                </div>
                <img src="{{ asset('confetti.png') }}" alt="" class="hidden lg:block absolute -top-[55px] lg:-top-[60px] size-20 lg:size-24 -z-30">
                <img src="{{ asset('confetti.png') }}" alt="" class="hidden lg:block absolute right-3 lg:right-7 bottom-3 lg:bottom-7 size-16 lg:size-24 -z-30 -scale-x-100">
            </div>
        </section>
    @endif

    <section class="my-10 lg:my-20">
        <div class="border border-heart p-4 rounded-md bg-heart bg-opacity-5">
            <h2 class="text-2xl lg:text-3xl font-bold text-heart">Perhatian!</h2>
            <p class="text-lg font-medium text-heart py-2">
                Siswa dilarang melakukan perayaan kelulusan dalam bentuk konvoi/corat-coret baju/jenis hura-hura lainnya. Siswa melakukan kegiatan tersebut maka akan diberi sanksi berupa penangguhan pemberian ijazah serta layanan pasca kelulusan 
            </p>
        </div>
    </section>
@endsection