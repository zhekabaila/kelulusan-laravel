@extends('components.user.layout')

@section('title', 'Selamat datang '.$data->nama)

@section('main')
    <section class="mt-20">
        <div class="relative">
            <div class="relative bg-primary bg-opacity-10 p-7 rounded-md border-2 border-primary w-full">
                <h1 class="text-primary text-2xl lg:text-3xl font-bold leading-9 lg:leading-[50px]">
                    Selamat {{ $data->nama }} 🥳 🤩, <br>
                    Anda Dinyatakan Lulus Dari {{ App\Models\Setting::first()->nama_sekolah }}!
                </h1>
                <div class="mt-7 lg:mt-3 text-primary text-lg lg:pr-80">
                    Dengan bangga kami umumkan bahwa Anda dinyatakan lulus dari SMA Negeri 1 Kasokandel! Mari siapkan diri untuk menghadapi bab baru dalam hidup Anda.
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

    <div class="my-16">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mt-8">
            <div class="bg-bg-200 p-7 lg:p-10 rounded-md">
                <div class="flex">
                    <h1 class="flex items-center gap-x-3 text-2xl font-medium rounded-md">
                        Biodata
                    </h1>
                </div>
                <div class="grid grid-cols-1 gap-6 mt-8 overflow-y-auto">
                    <div class="space-y-5">
                        <div>
                            <h2 class="text-base font-bold text-secondary">Nama :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nama }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">NIS :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nis }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">NISN :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nisn }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Tempat, Tanggal Lahir :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->ttl }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Nama Ortu :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->nama_ortu }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Peminatan :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->jurusan }}</p>
                        </div>
                        <div>
                            <h2 class="text-base font-bold text-secondary">Rombel :</h2>
                            <p class="text-lg font-medium text-secondary py-2 border-b border-b-secondary">{{ $data->kelas }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="bg-bg-200 p-7 lg:p-10 rounded-md w-full flex flex-col justify-between gap-y-6 lg:gap-y-0">
                <div>
                    <div class="flex">
                        <h1 class="flex items-center gap-x-3 text-2xl font-medium rounded-md">
                            Dokumen
                        </h1>
                    </div>
                    @php
                        $targetDateTime = App\Models\Setting::first()->target_waktu;
                    @endphp
                    <div class="grid grid-cols-1 gap-6 mt-8">
                        <div class="space-y-5">
                            <div>
                                <h2 class="text-base font-bold text-secondary">Surat Pengumuman Kelulusan :</h2>
                                @if (now()->greaterThanOrEqualTo($targetDateTime))
                                    <a href="{{ route('export.pengumuman_kelulusan') }}" target="_blank">
                                        <p class="text-lg font-medium text-primary py-2 border-b border-b-secondary hover:underline">
                                            unduh
                                        </p>
                                    </a>
                                @else
                                    <p class="text-lg font-medium text-secondary text-opacity-45 py-2 border-b border-b-secondary">
                                        dapat diunduh pada {{ Carbon\Carbon::parse($targetDateTime)->isoFormat('DD MMMM YYYY') }},
                                        pukul {{ Carbon\Carbon::parse($targetDateTime)->isoFormat('HH:mm')}}
                                    </p>
                                @endif
                            </div>
                            <div>
                                <h2 class="text-base font-bold text-secondary">Surat Keterangan Lulus :</h2>
                                @if (now()->greaterThanOrEqualTo($targetDateTime))
                                    <a href="{{ route('export.keterangan_lulus') }}" target="_blank">
                                        <p class="text-lg font-medium text-primary py-2 border-b border-b-secondary hover:underline">
                                            unduh
                                        </p>
                                    </a>
                                @else
                                    <p class="text-lg font-medium text-secondary text-opacity-45 py-2 border-b border-b-secondary">
                                        dapat diunduh pada {{ Carbon\Carbon::parse($targetDateTime)->isoFormat('DD MMMM YYYY') }},
                                        pukul {{ Carbon\Carbon::parse($targetDateTime)->isoFormat('HH:mm')}}
                                    </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border border-heart p-4 rounded-md bg-heart bg-opacity-5">
                    <h2 class="text-2xl font-bold text-heart">Perhatian!</h2>
                    <p class="text-lg font-medium text-heart py-2">
                        Siswa dilarang melakukan perayaan kelulusan dalam bentuk konvoi/corat-coret baju/jenis hura-hura lainnya. Siswa melakukan kegiatan tersebut maka akan diberi sanksi berupa penangguhan pemberian ijazah serta layanan pasca kelulusan 
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection