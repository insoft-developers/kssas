<?php

namespace App\Imports;

use App\Models\Saving;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SavingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Saving([
            "customer_id" => $row['customer_id'],
            "product_id" => $row['product_id'],
            "amount_in" => $row['amount_in'],
            "amount_out" => $row['amount_out'],
            "description" => $row['description'],
            "status" => 1
        ]);
    }
}
