<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'nama',
        'email',
        'jenis_laporan',
        'tempat_kejadian',
        'tanggal_kejadian',
        'isi_laporan',
        'dokumen_pendukung',
        'status',
    ];

}
