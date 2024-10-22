<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    use HasFactory;
    protected $fillable = [
      "customer_id",
      "type",
      "amount",
      "reason",
      "status"
    ];
}
