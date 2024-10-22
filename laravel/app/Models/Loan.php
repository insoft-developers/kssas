<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    
    protected $fillable = [
      "angsuran_jasa",
      "angsuran_pokok",
      "customer_id_pinjaman",
      "dp",
      "gaji_pokok",
      "iuran_pensiun",
      "jamsostek",
      "keterangan",
      "nilai_pengajuan",
      "no_rekening",
      "pajak_penghasilan",
      "pembiayaan_lama",
      "periode",
      "persentase",
      "potongan_baru",
      "potongan_kssas",
      "potongan_selain_kssas",
      "product_id",
      "saldo_gaji_netto",
      "shift_premium",
      "sisa_dibayar",
      "status_loan",
      "tanggal_masuk_kerja",
      "tanggal_pensiun",
      "telepon",
      "total_harga",
      "total_potongan",
      "total_tunjangan",
      "tunjangan_daerah",
      "tunjangan_lain",
      "tunjangan_manajemen",
      "tunjangan_posisi",
      "umur",
      "image1",
      "image2",
      "image3",
      "komentar",
      "upload_pembiayaan"
      
    ];
    

}
