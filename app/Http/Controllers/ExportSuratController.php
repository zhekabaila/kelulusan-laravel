<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportSuratController extends Controller
{
    public function pengumuman_kelulusan()
    {
        $pdf = Pdf::loadView('pdf.pengumuman-kelulusan', [
            'data' => Siswa::where('nis', auth()->user()->nis)->first(),
        ])->setPaper('folio');

        return $pdf->download('surat-pengumuman-kelulusan.pdf');
    }

    public function keterangan_lulus()
    {
        $pdf = Pdf::loadView('pdf.keterangan-lulus', [
            'data' => Siswa::where('nis', auth()->user()->nis)->first(),
            'mapel' => $this->getValueMapel()
        ])->setPaper('folio');

        return $pdf->download('surat-keterangan-lulus.pdf');
    }

    public function getValueMapel()
    {
        $siswa = Siswa::where('nis', auth()->user()->nis)->first();

        return [
            [
                'nama' => 'Kelompok A',
                'column' => 'span'
            ],
            [
                'no' => 1,
                'nama' => 'Pendidikan Agama dan Budi Pekerti',
                'nilai' => $siswa->nilai1 ?? 0
            ],
            [
                'no' => 2,
                'nama' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'nilai' => $siswa->nilai2 ?? 0
            ],
            [
                'no' => 3,
                'nama' => 'Bahasa indonesia',
                'nilai' => $siswa->nilai3 ?? 0
            ],
            [
                'no' => 4,
                'nama' => 'Matematika',
                'nilai' => $siswa->nilai4 ?? 0
            ],
            [
                'no' => 5,
                'nama' => 'Sejarah Indonesia',
                'nilai' => $siswa->nilai5 ?? 0
            ],
            [
                'no' => 6,
                'nama' => 'Bahasa Inggris',
                'nilai' => $siswa->nilai6 ?? 0
            ],
            [
                'nama' => 'Kelompok B',
                'column' => 'span'
            ],
            [
                'no' => 1,
                'nama' => 'Seni Budaya',
                'nilai' => $siswa->nilai7 ?? 0
            ],
            [
                'no' => 2,
                'nama' => 'Pendidikan Jasmani, Olah Raga, dan Kesehatan',
                'nilai' => $siswa->nilai8 ?? 0
            ],
            [
                'no' => 3,
                'nama' => 'Prakarya dan Kewirausahaan',
                'nilai' => $siswa->nilai9 ?? 0
            ],
            [
                'no' => 4,
                'nama' => 'Muatan Lokal: Bahasa Sunda',
                'nilai' => $siswa->nilai10 ?? 0
            ],
            [
                'nama' => 'Kelompok C',
                'column' => 'span'
            ],
            [
                'no' => 1,
                'nama' => isset($siswa->jurusan) ? ($siswa->jurusan === 'MIPA' ? 'Matematika' : 'Geografi') : '-',
                'nilai' => $siswa->nilai11 ?? 0
            ],
            [
                'no' => 2,
                'nama' => isset($siswa->jurusan) ? ($siswa->jurusan === 'MIPA' ? 'Biologi' : 'Sejarah') : '-',
                'nilai' => $siswa->nilai12 ?? 0
            ],
            [
                'no' => 3,
                'nama' => isset($siswa->jurusan) ? ($siswa->jurusan === 'MIPA' ? 'Fisika' : 'Sosiologi') : '-',
                'nilai' => $siswa->nilai3 ?? 0
            ],
            [
                'no' => 4,
                'nama' => isset($siswa->jurusan) ? ($siswa->jurusan === 'MIPA' ? 'Kimia' : 'Ekonomi') : '-',
                'nilai' => $siswa->nilai4 ?? 0
            ],
            [
                'no' => 5,
                'nama' => 'Pilihan Lintas Minat/Pendalaman Minat *',
                'nilai' => $siswa->nilai5 ?? 0
            ],
            [
                'nama' => 'Rata-rata',
                'nilai' => $siswa->nilai16 ?? 0
            ],
        ];
    }
}
