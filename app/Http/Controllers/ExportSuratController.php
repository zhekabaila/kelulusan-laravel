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

        return $pdf->stream();
    }

    public function keterangan_lulus()
    {
        $pdf = Pdf::loadView('pdf.keterangan-lulus', [
            'data' => Siswa::where('nis', auth()->user()->nis)->first(),
            'mapel' => $this->getValueMapel()
        ])->setPaper('folio');

        return $pdf->stream();
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
                'nilai' => $siswa->nilai1
            ],
            [
                'no' => 2,
                'nama' => 'Pendidikan Pancasila dan Kewarganegaraan',
                'nilai' => $siswa->nilai2
            ],
            [
                'no' => 3,
                'nama' => 'Bahasa indonesia',
                'nilai' => $siswa->nilai3
            ],
            [
                'no' => 4,
                'nama' => 'Matematika',
                'nilai' => $siswa->nilai4
            ],
            [
                'no' => 5,
                'nama' => 'Sejarah Indonesia',
                'nilai' => $siswa->nilai5
            ],
            [
                'no' => 6,
                'nama' => 'Bahasa Inggris',
                'nilai' => $siswa->nilai6
            ],
            [
                'nama' => 'Kelompok B',
                'column' => 'span'
            ],
            [
                'no' => 1,
                'nama' => 'Seni Budaya',
                'nilai' => $siswa->nilai7
            ],
            [
                'no' => 2,
                'nama' => 'Pendidikan Jasmani, Olah Raga, dan Kesehatan',
                'nilai' => $siswa->nilai8
            ],
            [
                'no' => 3,
                'nama' => 'Prakarya dan Kewirausahaan',
                'nilai' => $siswa->nilai9
            ],
            [
                'no' => 4,
                'nama' => 'Muatan Lokal: Bahasa Sunda',
                'nilai' => $siswa->nilai10
            ],
            [
                'nama' => 'Kelompok C',
                'column' => 'span'
            ],
            [
                'no' => 1,
                'nama' => $siswa->jurusan === 'IPA' ? 'Matematika' : 'Geografi',
                'nilai' => $siswa->nilai11
            ],
            [
                'no' => 2,
                'nama' => $siswa->jurusan === 'IPA' ? 'Biologi' : 'Sejarah',
                'nilai' => $siswa->nilai12
            ],
            [
                'no' => 3,
                'nama' => $siswa->jurusan === 'IPA' ? 'Fisika' : 'Sosiologi',
                'nilai' => $siswa->nilai3
            ],
            [
                'no' => 4,
                'nama' => $siswa->jurusan === 'IPA' ? 'Kimia' : 'Ekonomi',
                'nilai' => $siswa->nilai4
            ],
            [
                'no' => 5,
                'nama' => 'Pilihan Lintas Minat/Pendalaman Minat *',
                'nilai' => $siswa->nilai5
            ],
            [
                'nama' => 'Rata-rata',
                'nilai' => $siswa->nilai16
            ],
        ];
    }
}
