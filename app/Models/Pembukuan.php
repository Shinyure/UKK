<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembukuan extends Model
{
    protected $table = 'pembukuan'; 
    protected $fillable = ['bulan'];
    protected $guarded =  ['id'];

    public function absensi()
    {
        return $this->hasMany(Absensi::class, 'bulan_id');
    }

}
