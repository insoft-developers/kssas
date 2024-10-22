<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saving extends Model
{
    use HasFactory;
    protected $fillable = [
      "customer_id",
      "product_id",
      "amount_in",
      "amount_out",
      "description",
      "status",
      "upload_bukti"
    ];
}
