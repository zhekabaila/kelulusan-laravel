<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sekolah',
        'no_hp',
        'tahun_ajaran',
        'target_waktu'
    ];

    protected $table = 'setting';

    public $timestamps = false;
}
