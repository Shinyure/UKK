<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = ['nip','nama','devisi', 'foto'];

    public function absensi()
    {
    return $this->hasMany(Absensi::class, 'nip', 'nip');
    }

}

