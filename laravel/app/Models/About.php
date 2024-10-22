<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
      "judul_visi_misi",
      "visi",
      "misi",
      "tujuan",
      "visi_icon",
      "misi_icon",
      "tujuan_icon",
      "about_title",
      "about_content",
      "about_header_image"
        
    ];
}
