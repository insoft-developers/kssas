<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
      "nama",
      "nip",
      "fungsi",
      "telepon",
      "email",
      "alamat",
      "istri",
      "reg_id",
      "tempat_lahir",
      "tanggal_lahir",
      "jenis_kelamin",
      "nama_ibu",
      "jabatan",
      "file_image",
      "lama_pemotongan",
      "jumlah_potongan",
      "mulai_berlaku",
      "tahun"
    ];
}
