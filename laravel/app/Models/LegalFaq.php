<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalFaq extends Model
{
    use HasFactory;
    protected $fillable = ['pertanyaan', 'jawaban'];
}
