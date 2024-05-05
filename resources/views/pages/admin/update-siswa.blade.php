@extends('components.admin.layout')

@section('title', 'Update Siswa')

@section('main')
<form action="{{ route('action.update.siswa', $id) }}" method="POST" class="grid grid-cols-1 lg:grid-cols-2 gap-y-10 lg:gap-y-0 my-20">
    @csrf
    @method('PUT')
    <div class="lg:p-10">
        <h2 class="text-secondary text-3xl font-bold">Biodata Siswa</h2>
        <div class="mt-8">
            <div class="grid grid-cols-1 gap-6 mt-14">
                <p class="hidden lg:block lg:invisible">s</p>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nomor Induk Siswa :</p>
                    <input type="text" name="nis" id="nis" value="{{ $data->nis }}" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nis') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nomor Induk Siswa Nasional :</p>
                    <input type="text" name="nisn" id="nisn" value="{{ $data->nisn }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nisn') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nama :</p>
                    <input type="text" name="nama" id="nama" value="{{ $data->nama }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nama') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <p class="hidden lg:block lg:invisible">s</p>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Tempat, Tanggal Lahir :</p>
                    <input type="text" name="ttl" id="ttl" value="{{ $data->ttl }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="Majalengka, 28 Juni 2006" required>
                    @error('ttl') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Nama Orang Tua :</p>
                    <input type="text" name="nama_ortu" id="nama_ortu" value="{{ $data->nama_ortu }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nama_ortu') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <p class="hidden lg:block lg:invisible">s</p>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Jenis Kelamin :</p>
                    <select name="jk" id="jk" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" required>
                        <option value="L" {{ $data->jk === 'L' ? 'selected' : ''}}>Laki-laki</option>
                        <option value="P" {{ $data->jk === 'P' ? 'selected' : ''}}>Perempuan</option>
                    </select>
                    @error('jk') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Peminatan :</p>
                    <select name="jurusan" id="jurusan" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" required>
                        <option value="MIPA" {{ $data->jurusan === 'MIPA' ? 'selected' : ''}}>MIPA</option>
                        <option value="IPS" {{ $data->jurusan === 'IPA' ? 'selected' : ''}}>IPS</option>
                    </select>
                    @error('jurusan') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Rombel :</p>
                    <input type="text" name="kelas" id="kelas" value="{{ $data->kelas }}" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" placeholder="IPA-1" required>
                    @error('kelas') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="lg:p-10">
        <h2 class="text-secondary text-3xl font-bold">Nilai Siswa</h2>
        <div class="mt-8">
            <div class="grid grid-cols-2 gap-6 mt-14">
                <label class="col-span-2 text-base font-bold text-secondary">
                    Kelompok A
                </label>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Pendidikan Agama dan Budi Pekerti :</p>
                    <input type="text" value="{{ $data->nilai1 }}" name="nilai1" id="nilai1" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai1') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Pendidikan Pancasila dan Kewarganegaraan :</p>
                    <input type="text" value="{{ $data->nilai2 }}" name="nilai2" id="nilai2" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai2') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Bahasa indonesia :</p>
                    <input type="text" value="{{ $data->nilai3 }}" name="nilai3" id="nilai3" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai3') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Matematika :</p>
                    <input type="text" value="{{ $data->nilai4 }}" name="nilai4" id="nilai4" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai4') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Sejarah Indonesia :</p>
                    <input type="text" value="{{ $data->nilai5 }}" name="nilai5" id="nilai5" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai5') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Bahasa Inggris :</p>
                    <input type="text" value="{{ $data->nilai6 }}" name="nilai6" id="nilai6" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai6') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <label class="col-span-2 text-base font-bold text-secondary">
                    Kelompok B
                </label>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Seni Budaya :</p>
                    <input type="text" value="{{ $data->nilai7 }}" name="nilai7" id="nilai7" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai7') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Pendidikan Jasmani, Olah Raga, dan Kesehatan :</p>
                    <input type="text" value="{{ $data->nilai8 }}" name="nilai8" id="nilai8" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai8') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Prakarya dan Kewirausahaan :</p>
                    <input type="text" value="{{ $data->nilai9 }}" name="nilai9" id="nilai9" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai9') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Muatan Lokal: Bahasa Sunda :</p>
                    <input type="text" value="{{ $data->nilai10 }}" name="nilai10" id="nilai10" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai10') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <label class="col-span-2 text-base font-bold text-secondary">
                    Kelompok C
                </label>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Matematika/Geografi :</p>
                    <input type="text" value="{{ $data->nilai11 }}" name="nilai11" id="nilai11" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai11') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Biologi/Sejarah :</p>
                    <input type="text" value="{{ $data->nilai12 }}" name="nilai12" id="nilai12" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai12') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Fisika/Sosiologi :</p>
                    <input type="text" value="{{ $data->nilai13 }}" name="nilai13" id="nilai13" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai13') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Kimia/Ekonomi :</p>
                    <input type="text" value="{{ $data->nilai14 }}" name="nilai14" id="nilai14" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai14') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Pilihan Lintas Minat/Pendalaman Minat * :</p>
                    <input type="text" value="{{ $data->nilai15 }}" name="nilai15" id="nilai15" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai15') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <p class="text-sm font-bold text-secondary mb-2">Rata-rata :</p>
                    <input type="text" value="{{ $data->nilai16 }}" name="nilai16" id="nilai16" maxlength="255" class="bg-mist p-4 rounded-[10px] outline outline-1 outline-secondary focus:bg-white focus:outline focus:outline-[3px] focus:outline-[#80BEFC] w-full text-secondary font-medium" autocomplete="off" required>
                    @error('nilai16') <p class="text-base text-heart mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>
        <div class="flex justify-start lg:justify-end">
            <button type="submit" class="flex items-center gap-x-12 bg-primary rounded-[10px] p-4 mt-6">
                <span class="text-white text-lg font-bold">Create</span>
                <img src="{{ asset('HiOutlineChevronRight.svg') }}" alt="">
            </button>
        </div>
    </div>
</form>
@endsection