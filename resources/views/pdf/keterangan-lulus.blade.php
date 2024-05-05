<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Keterangan Lulus {{ $data->nama ?? '-' }}</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        .border-nilai {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div style="margin: 0">
        <header style="position: relative">
            <img src="{{ public_path('logo.png') }}" alt="" style="position: absolute; top: 0px;" width="100">
            <h1 style="text-align: center; font-size: 16px; text-transform: uppercase;">PEMERINTAHAN DAERAH PROVINSI JAWA BARAT <br>
                DINAS PENDIDIKAN <br>
                CABANG DINAS PENDIDIKAN WILAYAH IX <br>
                {{ App\Models\Setting::first()->nama_sekolah }}
            </h1>
            <p style="text-align: center; font-size: 12px; line-height: 3px">Jl. Desa Kasokandel Timur No. 65 Tlp. (0233)661522, Kasokandel 45477B1 Kab.Majalengka</p>
            <p style="text-align: center; font-size: 12px; line-height: 3px">www.sman1kasokandel.sch.id &nbsp; email:sman1kasokandel@gmail.com</p>
            <p style="text-align: center; font-size: 12px; line-height: 3px">NSS: 30.102.1611.013 &nbsp; NPSN: 20213883</p>
        </header>
        <div style="height: 1px; background: #000;"></div>
        <div style="height: 2px; background: #000; margin-top: 1px"></div>
    </div>
    <h2 style="font-size: 16px; text-align: center; font-weight: 500; text-decoration: underline">
        SURAT KETERANGAN LULUS
    </h2>
    <p style="font-size: 14px;">
        Kepala {{ App\Models\Setting::first()->nama_sekolah }} selaku Ketua Penyelenggara Penilaian Sumatif Akhir Jenjang Tahun Pelajaran {{ App\Models\Setting::first()->tahun_ajaran }} berdasarkan:
    </p>
    <ol style="margin-left: -20px; margin-top: -10px;">
        <li>Ketuntasan dari seluruh program pembelajaran pada kurikulum 2013;</li>
        <li>Kriteria kelulusan dari satuan pendidikan sesuai dengan Kurikulum Tingkat Satuan Pendidikan dan peraturan perundang-undangan serta;</li>
        <li>Rapat Pleno Dewan Guru tentang Kelulusan pada tanggal 3 Mei 2024</li>
    </ol>
    <h3 style="font-size: 14px; font-weight: normal; line-height: 14px">menerangkan bahwa:</h3>
    <table style="margin-left: 26px; margin-top: -10px">
        <tr>
            <td style="font-size: 14px;">Nama</td>
            <td style="padding-left: 30px; font-size: 14px;">: {{ $data->nama ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Tempat dan Tanggal Lahir</td>
            <td style="padding-left: 30px; font-size: 14px;">: {{ $data->ttl ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Nama Orang Tua</td>
            <td style="padding-left: 30px; font-size: 14px;">: {{ $data->nama_ortu ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Nomor Induk Siswa</td>
            <td style="padding-left: 30px; font-size: 14px;">: {{ $data->nis ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Nomor Induk Siswa Nasional</td>
            <td style="padding-left: 30px; font-size: 14px;">: {{ $data->nisn ?? '-' }}</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Peminatan/Rombel</td>
            <td style="padding-left: 30px; font-size: 14px;">: {{ ($data->jurusan ?? '-') . '/' . ($data->kelas ?? '-') }}</td>
        </tr>
        <tr>
            <td style="font-size: 14px;">Dinyatakan</td>
            <td style="padding-left: 30px; font-size: 14px; font-weight: bold">: LULUS</td>
        </tr>
    </table>

    <h3 style="font-size: 14px; font-weight: normal; line-height: 14px">dengan nilai sebagai berikut:</h3>
    <div style="width: 100%; margin-top: -30px; transform: scale(.9)">
        <table class="border-nilai" style="width: 100%;" cellpadding="" cellspacing="0">
            <tr>
                <th class="border-nilai" style="font-size: 14px">No.</th>
                <th class="border-nilai" style="font-size: 14px">Mata Pelajaran <br> (Kurikulum 2023)</th>
                <th class="border-nilai" style="font-size: 14px">Nilai Ujian <br>Sekolah</th>
            </tr>
            @foreach ($mapel as $item)
                <tr>
                    @if (!empty($item['column']) && $item['column'] === 'span')
                        <td class="border-nilai" style="font-size: 14px; font-weight: bold" colspan="2">{{ $item['nama'] }}</td>
                        <td class="border-nilai"></td>
                    @elseif ($item['nama'] === 'Rata-rata')
                        <td class="border-nilai" style="font-size: 14px; text-align: center; font-weight: bold;" colspan="2">{{ $item['nama'] }}</td>
                        <td class="border-nilai" style="font-size: 14px; text-align: center; font-weight: bold;">
                            {{ number_format($item['nilai'], 2) }}
                        </td>
                    @elseif (!empty($item['no']))
                        <td class="border-nilai" style="text-align: center; font-size: 14px">{{ $item['no'] }}</td>
                        <td class="border-nilai" style="font-size: 14px">{{ $item['nama'] }}</td>
                        <td class="border-nilai" style="font-size: 14px; text-align: center">
                            {{ number_format($item['nilai'], 2) }}
                        </td>
                    @endif
                </tr>
            @endforeach
        </table>
        <p style="line-height: 2px; font-style: italic; font-size: 13px">
            @if (isset($data->jurusan) && $data->jurusan === 'MIPA')
                *) Geografi: MIPA-1 dan MIPA-2 | Ekonomi: MIPA-3, MIPA-4 dan MIPA-5
            @else
                *) Kimia: IPS-1, IPS-2, dan IPS-2 | Bahasa dan Sastra Inggris: IPS-4 | Biologi:  IPS-5, IPS-6, dan IPS-7
            @endif
        </p>
    </div>

    <div style="position: relative;">
        <div style="position: absolute; margin-top: -10px; right: -60px;">
            <img src="{{ public_path('ttd.png') }}" alt="" style="position: absolute; left: -110px; top: -5px" width="290">
            <table style="margin: 0; padding: 0">
                <tr style="margin: 0; padding: 0;">
                    <td style="font-size: 14px; line-height: 11px">Dikeluarkan di</td>
                    <td style="font-size: 14px; line-height: 11px">: Kasokandel</td>
                </tr>
                <tr style="margin: 0; padding: 0;">
                    <td style="font-size: 14px; line-height: 11px">Pada Tanggal</td>
                    <td style="font-size: 14px; line-height: 11px">: 06 Mei 2024</td>
                </tr>
                <tr>
                    <td style="font-size: 14px; line-height: 11px">Kepala Sekolah,</td>
                </tr>
            </table>
            <table style="margin-top: 130px; padding: 0">
                <tr style="margin: 0; padding: 0;">
                    <td style="font-size: 14px; line-height: 11px; text-decoration: underline; font-weight: bold;">Dra. Hj. YANI MALIHAH</td>
                </tr>
                <tr style="margin: 0; padding: 0;">
                    <td style="font-size: 14px; line-height: 11px; font-weight: bold;">Pembina Utama Muda</td>
                </tr>
                <tr style="margin: 0; padding: 0;">
                    <td style="font-size: 14px; line-height: 11px; font-weight: bold;">NIP. 19651025 199103 2 005</td>
                </tr>
            </table>
        </div>
    </div>
    </div>
</body>
</html>