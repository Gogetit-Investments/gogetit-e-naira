<?php
namespace App\Imports;
use App\Models\Consumer;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Auth;

class ConsumerImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //This class will make the import driver to skip the first line. This is to make the first line the header
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        return new Consumer([
            'tier_id'     => $row[0],
            'bvn' => $row[1],
            'nin' => $row[2],
            'first_name' => $row[3],
            'last_name'    => $row[4],
            // 'added_by' => Hash::make($row[5])
            'added_by' =>  Auth::user()->id,
        ]);
    
    }
}