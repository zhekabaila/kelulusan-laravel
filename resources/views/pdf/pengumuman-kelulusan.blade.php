<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;
        }

        ul {
            list-style-type: none;
        }

        li {
            position: relative;
        }

        li::before {
            content: "-";
            position: absolute;
            top: -2px;
            left: -13px;
        } 
    </style>
</head>
<body>
    <div style="margin: 0">
        <header style="position: relative">
            <img src="{{ public_path('logo.png') }}" alt="" style="position: absolute; top: 0px;" width="100">
            <h1 style="text-align: center; font-size: 16px; text-transform: uppercase;">
                PEMERINTAHAN DAERAH PROVINSI JAWA BARAT <br>
                DINAS PENDIDIKAN <br>
                CABANG DINAS PENDIDIKAN WILAYAH IX <br>
                {{ App\Models\Setting::first()->nama_sekolah }}
            </h1>
            <p style="text-align: center; font-size: 12px; line-height: 3px">Jl. Desa Kasokandel Timur No. 65 Tlp. (0233)661522, Kasokandel 45477B1 Kab.Majalengka</p>
            <p style="text-align: center; font-size: 12px; line-height: 3px">www.sman1kasokandel.sch.id &nbsp; email:sman1kasokandel@gmail.com</p>
            <p style="text-align: center; font-size: 12px; line-height: 3px">NSS: 30.102.1611.013 &nbsp; NPSN: 20213883</p>
        </header>
        <div style="height: 1px; background: #000;"></div>
        <div style="height: 3px; background: #000; margin-top: 1px"></div>
    </div>
    <br>
    <h2 style="font-size: 14px; text-align: center; font-weight: bold">
        KEPUTUSAN <br>
        KEPALA {{ App\Models\Setting::first()->nama_sekolah }}<br>
        NOMOR : 421.3/329/SMA 1-WIL.IX
    </h2>
    <br>
    <h3 style="font-size: 14px; text-align: center">
        Tentang <br>
        Penetapan Kelulusan Siswa Kelas XII dari {{ App\Models\Setting::first()->nama_sekolah }}<br>
        Tahun Pelajaran {{ App\Models\Setting::first()->tahun_ajaran }}
    </h3>
    <br>
    <table>
        <tr>
            <td style="font-size: 14px; vertical-align: top; position: relative">
                    Menimbang
                <div style="position: absolute; top: 0; left: 148px;">:</div>
            </td>
            <td style="font-size: 14px; padding-left: 86px">Bahwa  sesuai  dengan  Permendikbudristek RI Nomor 21 Tahun 2022 tentang Standar Penilaian Pendidikan pada Pendidikan Anak Usia Dini, Jenjang Pendidikan Dasar, dan Jenjang Pendidikan Menengah</td>
        </tr>
        <tr>
            <td style="font-size: 14px; padding-top: 16px; vertical-align: top; position: relative">
                Menimbang
                <div style="position: absolute; top: 16px; left: 148px;">:</div>
            </td>
            <td style="font-size: 14px; padding-left: 61px">
                <ul>
                    <li>Prosedur Operasi Standar (POS) Penilaian Sumatif Akhir Jenjang (PSAJ) {{ App\Models\Setting::first()->nama_sekolah }} Kabupaten Majalengka Tahun Pelajaran {{ App\Models\Setting::first()->tahun_ajaran }}</li>
                    <li style="margin-top: 6px">Hasil rapat dewan guru {{ App\Models\Setting::first()->nama_sekolah }} tentang penetapan kelulusan siswa kelas XII dari {{ App\Models\Setting::first()->nama_sekolah }} Tahun Pelajaran {{ App\Models\Setting::first()->tahun_ajaran }}</li>
                </ul>
            </td>
        </tr>
    </table>
    <br>
    <h2 style="font-size: 14px; text-align: center">MEMUTUSKAN</h2>
    <h2 style="font-size: 14px; text-align: left; line-height: 10px">MENETAPKAN</h2>
    <table style="margin: 0">
        <tr>
            <td style="font-size: 14px; vertical-align: top; position: relative; line-height: 6px">
                    Pertama
                <div style="position: absolute; top: 0; left: 145px;">:</div>
            </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td style="font-size: 14px; line-height: 12px; padding-left: 100px">Nama</td>
                        <td style="padding-left: 24px">: {{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; line-height: 12px; padding-left: 100px">Tempat/Tanggal Lahir</td>
                        <td style="padding-left: 24px">: {{ $data->ttl }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; line-height: 12px; padding-left: 100px">NISN</td>
                        <td style="padding-left: 24px">: {{ $data->nisn }}</td>
                    </tr>
                    <tr>
                        <td style="font-size: 14px; line-height: 12px; padding-left: 100px">Peminatan/Rombel</td>
                        <td style="padding-left: 24px">: {{ $data->jurusan . '/' . $data->kelas }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <div style="margin: 28px auto">
        <div style="border: 3px solid black; width: 260px; margin: 0 auto; padding: 10px; text-align: center;">
            <span style="font-size: 20px; font-weight: bold;">LULUS</span>
            <span style="font-size: 20px; font-weight: bold;">/</span>
            <span style="font-size: 20px; font-weight: bold; text-decoration: line-through;">TIDAK LULUS</span>
        </div>
        <p style="text-align: center; line-height: 5px">dari {{ App\Models\Setting::first()->nama_sekolah }} Tahun Pelajaran {{ App\Models\Setting::first()->tahun_ajaran }}</p>
    </div>
    <table>
        <tr>
            <td style="font-size: 14px; vertical-align: top; position: relative">
                    Kedua
                <div style="position: absolute; top: 0; left: 145px;">:</div>
            </td>
            <td style="font-size: 14px; padding-left: 120px">
                Keputusan ini mulai berlaku sejak tanggal ditetapkan, dan apabila terdapat kekeliruan akan diadakan perbaikan sebagaimana mestinya.
            </td>
        </tr>
    </table>
    <div style="position: relative;">
        <div style="position: absolute; margin-top: 50px; right: -70px">
            <img src="{{ public_path('ttd.png') }}" alt="" style="position: absolute; left: -110px; top: -16px" width="290">
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
            <table style="margin-top: 110px; padding: 0">
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