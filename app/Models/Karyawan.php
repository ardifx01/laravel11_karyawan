<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;



    public $timestamps = false;
    protected $primaryKey = 'id_karyawan';
    protected $table = 'karyawan';
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'hp',
        'domisili',
        'foto',
    ];
}
