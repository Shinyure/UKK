<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = ['nip', 'nama', 'devisi', 'foto'];
    protected $primaryKey = 'nip';  // Menggunakan 'nip' sebagai primary key
    public $incrementing = false;   // Karena 'nip' bukan auto-increment

    // Relasi One-to-Many dengan Absensi
    public function absensi()
    {
        // Gunakan 'nip' sebagai foreign key pada absensi
        return $this->hasMany(Absensi::class, 'nip', 'nip');
    }
}
