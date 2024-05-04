<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nisn',
        'nama',
        'nama_ortu',
        'ttl',
        'jk',
        'jurusan',
        'kelas',
        'nilai1',
        'nilai2',
        'nilai3',
        'nilai4',
        'nilai5',
        'nilai6',
        'nilai7',
        'nilai8',
        'nilai9',
        'nilai10',
        'nilai11',
        'nilai12',
        'nilai13',
        'nilai14',
        'nilai15',
        'nilai16'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'nis', 'nis');
    }
}
