<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainTopic extends Model
{
    use HasFactory;
    protected $fillable = [
      "judul",
      "isi",
      "sub_judul1",
      "sub_judul2",
      "sub_judul3",
      "sub_isi1",
      "sub_isi2",
      "sub_isi3",
      "gambar1",
      "gambar2",
      "gambar3",
    ];
}
