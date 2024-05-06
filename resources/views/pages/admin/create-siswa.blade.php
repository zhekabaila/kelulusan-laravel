@extends('components.admin.layout')

@section('title', 'Create Siswa')

@section('main')
<form action="{{ route('action.create.siswa') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-y-10 lg:gap-y-0 my-20">
    @csrf
    @method('POST')
    <div class="lg:p-10">
        <h2 class="text-secondary text-3xl font-bold">Biodata Siswa</h2>
        <div class="mt-8">
            <div class="grid grid-cols-1 gap-6 mt-14">
                <p class="hidden lg:block lg:invisible">s</p>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nomor Induk Siswa :</p>
                    <input type="text" name="nis" id="nis" value="{{ old('nis') }}" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nis') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nomor Induk Siswa Nasional :</p>
                    <input type="text" name="nisn" id="nisn" value="{{ old('nisn') }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nisn') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nama :</p>
                    <input type="text" name="nama" id="nama" value="{{ old('nama') }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nama') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <p class="hidden lg:block lg:invisible">s</p>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Tempat, Tanggal Lahir :</p>
                    <input type="text" name="ttl" id="ttl" value="{{ old('ttl') }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Majalengka, 28 Juni 2006" required>
                    @error('ttl') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nama Orang Tua :</p>
                    <input type="text" name="nama_ortu" id="nama_ortu" value="{{ old('nama_ortu') }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nama_ortu') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <p class="hidden lg:block lg:invisible">s</p>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Jenis Kelamin :</p>
                    <select name="jk" id="jk" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" required>
                        <option value="L" {{ old('jk') === 'L' ? 'selected' : ''}}>Laki-laki</option>
                        <option value="P" {{ old('jk') === 'P' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @error('jk') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Jurusan :</p>
                    <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan') }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('jurusan') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Kelas :</p>
                    <input type="text" name="kelas" id="kelas" value="{{ old('kelas') }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('kelas') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div class="flex justify-start">
                    <button type="submit">
                        <div class="flex items-center gap-x-12 bg-primary rounded-[10px] p-4 mt-6">
                            <span class="text-white text-lg font-bold">Create</span>
                            <img src="{{ asset('HiOutlineChevronRight.svg') }}" alt="">
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection