<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensi';
    protected $primaryKey = 'id';  
    public $incrementing = true;   
    protected $fillable = [
        'nip', 'nama', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'bulan_id'
    ];

    // Relasi ke Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'nip', 'nip');
    }

}
