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
    // public function rules(): array
    // {
    //     return [
    //         'bvn' => Consumer::unique('consumer_data', 'bvn'), // Table name, field in your db
    //     ];
    // }
    
    // public function customValidationMessages()
    // {
    //     return [
    //         'bvn.unique' => 'Custom message',
    //     ];
    // }
    public function model(array $row)
    {
                // Available alpha caracters
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// generate a pin based on 2 * 7 digits + a random character
$pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];

// shuffle the result
$string = str_shuffle($pin);

        return new Consumer([
            'registration_number' => $string,
            'tier_id'     => $row[0],
            'bvn' => $row[1],
            'nin' => $row[2],
            'first_name' => $row[3],
            'last_name'    => $row[4],
            'phone_number'    => $row[5],
            // 'added_by' => Hash::make($row[5])
            'added_by' =>  Auth::user()->id,
        ]);
    
    }

    
}