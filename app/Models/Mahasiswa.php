<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'id';

    protected $fillable = [
        'nis',
        'nama',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'hobi'
    ];
}
