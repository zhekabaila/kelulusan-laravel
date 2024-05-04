@extends('components.admin.layout')

@section('title', 'Dashboard')

@section('main')
<div class="my-10 lg:my-20">
    <div class="flex items-center gap-x-0">
        <h1 class="lg:text-left text-2xl font-semibold lg:text-2xl text-secondary border-4 border-secondary px-4 py-1">
            Dashboard
        </h1>
        <div class="bg-secondary h-1 w-full"></div>
    </div>
    @if (session()->has('failures')) 
        <div class="mt-8">
            <h3 class="text-black text-xl font-bold">{{ count(session('failures')) }} Error terjadi ketika mengimport data!</h3>
            <div class="overflow-x-scroll bg-white rounded-md drop-shadow-lg mt-3">
                <table class="min-w-full w-max">
                    <thead>
                        <tr>
                            <th rowspan="2" class="p-2.5 text-secondary text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-heart bg-opacity-20">Baris</th>
                            <th rowspan="2" class="p-2.5 text-secondary text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-heart bg-opacity-20">Atribut</th>
                            <th rowspan="2" class="p-2.5 text-secondary text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-heart bg-opacity-20">Pesan</th>
                            <th rowspan="2" class="p-2.5 text-secondary text-center text-sm font-bold border-[0.5px] border-[#00000019] bg-heart bg-opacity-20">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (session('failures') as $validation)
                            <tr>
                            <td class="p-2.5 text-secondary text-center text-sm font-medium border-[0.5px] border-[#00000019] bg-white">{{ $validation->row() }}</td>
                            <td class="p-2.5 text-secondary text-center text-sm font-medium border-[0.5px] border-[#00000019] bg-white">{{ $validation->attribute() }}</td>
                            <td class="p-2.5 text-secondary text-sm font-medium border-[0.5px] border-[#00000019] bg-white">
                                <ul>
                                    @foreach ($validation->errors() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="p-2.5 text-secondary text-center text-sm font-medium border-[0.5px] border-[#00000019] bg-white">
                                {{ $validation->values()[$validation->attribute()] }}
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="mt-10">
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-x-6 gap-y-3">
            <div class="flex items-center gap-x-3">
                <a href="{{ route('create.siswa') }}" class="text-[#DE722E] border border-[#DE722E] bg-[#FFF5E8] rounded-lg px-3 py-1.5 lg:p-3">
                    Create
                </a>
                <a href="{{ asset('siswa-template-import.xlsx') }}" class="text-[#DE722E] border border-[#DE722E] bg-[#FFF5E8] rounded-lg px-3 py-1.5 lg:p-3" download="">
                    <img src="{{ asset('HiDownload.svg') }}" alt="">
                </a>
            </div>
            <form action="{{ route('import.siswa') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2 flex-wrap">
                @csrf
                @method('POST')
                <input type="file" name="excel" accept=".xlsx" required class="bg-white border-2 border-primary border-dashed p-2 lg:p-3 rounded-md max-w-60">
                <button type="submit" class="bg-primary bg-opacity-10 text-primary text-sm lg:text-base font-base lg:font-medium border-2 border-primary rounded-md px-4 lg:px-5 py-2.5 lg:py-3">Import</button>
            </form>
        </div>
        <div class="overflow-x-scroll bg-white mt-2 rounded-lg drop-shadow-lg">
            <table class="min-w-full w-max mt-2" cellpadding="10">
                <thead class="text-primary font-bold text-center">
                    <tr class="bg-primary bg-opacity-15 border-b border-b-secondary">
                        <th class="px-10">No.</th>
                        <th class="px-10">NIS</th>
                        <th class="px-10">NISN</th>
                        <th class="px-10">Nama</th>
                        <th class="px-10">Tempat, tanggal lahir</th>
                        <th class="px-10">Nama Ortu</th>
                        <th class="px-10">Jenis Kelamin</th>
                        <th class="px-10">Jurusan</th>
                        <th class="px-10">Kelas</th>
                        @for ($i = 1; $i <= 16; $i++)
                            <th class="px-10">Nilai {{ $i }}</th>
                        @endfor
                        <th class="px-10">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $index => $item)
                        <tr class="group border-b border-b-secondary border-opacity-30">
                            <td class="text-center max-w-min group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $index+1 }}</td>
                            <td class="text-left group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->nis }}</td>
                            <td class="text-left group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->nisn }}</td>
                            <td class="text-left group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->nama }}</td>
                            <td class="text-left group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->ttl }}</td>
                            <td class="text-left group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->nama_ortu }}</td>
                            <td class="text-center group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->jk }}</td>
                            <td class="text-center group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->jurusan }}</td>
                            <td class="text-center group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ $item->kelas }}</td>
                            @for ($i = 1; $i <= 16; $i++)
                                <td class="text-center group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">{{ number_format($item['nilai'.$i], 2) }}</td>
                            @endfor
                            <td class="flex items-center justify-center gap-x-4 group-hover:bg-gray-200 group-hover:bg-opacity-25 pt-3">
                                <a href="{{ route('update.siswa', $item->id) }}" class="font-semibold text-green-500 hover:underline">Edit</a> |
                                <a href="{{ route('delete.siswa', $item->id) }}" class="font-semibold text-heart hover:underline" onclick="return confirm('Apakah anda yakin ingin menghapus data dengan nis: {{ $item->nis }} ini?')">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $data->appends(request()->query())->links() }}
        </div>
    </div>
</div>
@endsection