<?php
namespace App\Imports;
use App\Models\Consumer;
use App\Models\Settings;
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

$commission = Settings::select('agent_commission')->value('agent_commission');
$referral_code = Settings::select('referral_code')->value('referral_code');
// $consumer->added_by = auth()->id();

        return new Consumer([
            'registration_number' => $string,
            'tier_id'     => $row[0],
            'bvn' => $row[1],
            'nin' => $row[2],
            'phone_number'    => $row[3],
            'title_code'    => $row[4],
            'last_name'    => $row[5],
            'first_name' => $row[6],
            'middle_name'    => $row[7],
            'postal_code'    => $row[8],
            'contact_address'    => $row[9],
            'city'    => $row[10],
            'lga'    => $row[11],
            'state_code'    => $row[12],
            'country'    => $row[13],
            'dob'    => $row[14],
            'country_of_birth'    => $row[15],
            'state_of_birth'    => $row[16],
            'referral_code'    => $referral_code,
            'commission' => $commission,
            'added_by' =>  Auth::user()->id,

            // 'added_by' => Hash::make($row[5])
        ]);
    
    }

    
}