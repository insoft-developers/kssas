<?php

namespace App\Imports;

use App\Models\Loan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date;


class LoanImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $tanggal_pensiun = Date::excelToDateTimeObject($row['tanggal_pensiun']);
        $tanggal_masuk_kerja = Date::excelToDateTimeObject($row['tanggal_masuk_kerja']);
        
        return new Loan([
            "customer_id_pinjaman" => $row['customer_id'],
            "umur" => $row['umur'],
            "tanggal_pensiun" => $tanggal_pensiun,
            "tanggal_masuk_kerja" => $tanggal_masuk_kerja,
            "telepon" => $row['telepon'],
            "no_rekening" => $row['no_rekening'],
            "gaji_pokok" => $row['gaji_pokok'],
            "tunjangan_posisi" => $row['tunjangan_posisi'] ,
            "tunjangan_manajemen" => $row['tunjangan_manajemen'],
            "tunjangan_daerah" => $row['tunjangan_daerah'],
            "shift_premium" => $row['shift_premium'],
            "tunjangan_lain" => $row['tunjangan_lain'],
            "pajak_penghasilan" => $row['pajak_penghasilan'],
            "iuran_pensiun"=> $row['iuran_pensiun'],
            "jamsostek" => $row['jamsostek'],
            "potongan_kssas" => $row['potongan_kssas'],
            "potongan_selain_kssas" => $row['potongan_selain_kssas'],
            "product_id" => $row['product_id'],
            "nilai_pengajuan" => $row['nilai_pengajuan'],
            "angsuran_pokok" => $row['angsuran_pokok'],
            "periode" => $row['periode'],
            "dp" => $row['dp'],
            "angsuran_jasa" => $row['angsuran_jasa'],
            "potongan_baru" => $row['potongan_baru'],
            "pembiayaan_lama" => $row['pembiayaan_lama'],
            "persentase" => $row['persentase'],
            "saldo_gaji_netto" => $row['saldo_gaji_netto'],
            "keterangan" => $row['keterangan'],
            "komentar" => '',
            "status_loan" => 2,
            "total_harga" => $row['total_harga'],
            "sisa_dibayar" => $row['sisa_dibayar'],
            "total_tunjangan" => $row['total_tunjangan'],
            "total_potongan" => $row['total_potongan'],
           
        ]);
    }
}
