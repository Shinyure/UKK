<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    protected $primaryKey = 'kodeabsensi';
    
    protected $fillable = [
        'nip', 
        'senin', 
        'selasa', 
        'rabu', 
        'kamis', 
        'jumat',
        'tanggal'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nip', 'nip');
    }
}


