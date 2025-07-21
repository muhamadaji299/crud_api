<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table ='dosens' ;
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_dosen',
        'nip',
        'alamat',
        'email',
        'no_telp'
    ];

}
