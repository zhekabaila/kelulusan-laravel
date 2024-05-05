@extends('components.admin.layout')

@section('title', 'Setting')

@section('main')
<div class="my-20 lg:max-w-[50%] lg:p-10">
    <h2 class="text-secondary text-3xl font-bold">Setting</h2>
    <form action="{{ route('update.setting') }}" method="POST" class="mt-8">
        @csrf
        @method('POST')
        <div class="space-y-6 mt-14">
            <div>
                <p class="text-base font-bold text-secondary mb-2">Nama Sekolah :</p>
                <input type="text" name="nama_sekolah" id="nama_sekolah" value="{{ $data->nama_sekolah }}" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" autofocus placeholder="Nama Sekolah" required>
                @error('nama_sekolah') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <p class="text-base font-bold text-secondary mb-2">Tahun Ajaran :</p>
                <input type="text" name="tahun_ajaran" id="tahun_ajaran" value="{{ $data->tahun_ajaran }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Tahun Ajaran" maxlength="9">
                @error('tahun_ajaran') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <p class="text-base font-bold text-secondary mb-2">Target Waktu :</p>
                <input type="datetime-local" name="target_waktu" id="target_waktu" value="{{ $data->target_waktu }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Target Waktu">
                @error('target_waktu') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <p class="text-base font-bold text-secondary mb-2">No. Hp :</p>
                <input type="text" name="no_hp" id="no_hp" value="{{ $data->no_hp }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Jengan menggunakan 0 pada awal nomor">
                @error('no_hp') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
            </div>
        </div>
        <button type="submit" class="flex items-center gap-x-12 bg-primary rounded-[10px] p-4 mt-6">
            <span class="text-white text-lg font-bold">Update</span>
            <img src="{{ asset('HiOutlineChevronRight.svg') }}" alt="">
        </button>
    </form>
</div>
@endsection