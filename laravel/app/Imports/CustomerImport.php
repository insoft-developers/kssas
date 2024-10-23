<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use \PhpOffice\PhpSpreadsheet\Shared\Date;


class CustomerImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        
        $date = Date::excelToDateTimeObject($row['tanggal_lahir']);
       
        return new Customer([
            'nama' => $row['nama'],
            'nip' => $row['nip'],
            'fungsi' => $row['fungsi'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'telepon' => $row['telepon'],
            'email' => $row['email'],
            'alamat' => $row['alamat'],
            'istri' => $row['istri'],
            'reg_id' => $row['reg_id'],
            'password' => SHA1($row['password']),
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $date,
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nama_ibu' => $row['nama_ibu'],
            'jabatan' => $row['jabatan'],
            'lama_pemotongan' => $row['lama_pemotongan'],
            'jumlah_potongan' => $row['jumlah_potongan'],
            'mulai_berlaku' => $row['mulai_berlaku'],
            'tahun' => $row['tahun'],
            'is_active' => 1,
            'simpanan_pokok' => $row['simpanan_pokok'] == NULL ? 0 : $row['simpanan_pokok'],
            'simpanan_wajib' => $row['simpanan_wajib'] == NULL ? 0 : $row['simpanan_wajib'],
            'simpanan_sukarela' => $row['simpanan_sukarela'] == NULL ? 0 : $row['simpanan_sukarela'],
        ]);
    }
}
