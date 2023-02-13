<?php
namespace App\Imports;
use App\Models\Consumer;
use App\Models\Settings;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
            // 'tier_id'     => $row[0],
            // 'bvn' => $row[1],
            // 'nin' => $row[2],
            'phone_number'    => $row[0],
            'title_code'    => $row[1],
            'last_name'    => $row[2],
            'first_name' => $row[3],
            'middle_name'    => $row[4],
            'postal_code'    => $row[5],
            'contact_address'    => $row[6],
            'city'    => $row[7],
            'lga'    => $row[8],
            'state_code'    => $row[9],
            'country'    => $row[10],
            'dob'    =>  $row[11],
            // 'dob'    => Carbon::createFromFormat('d/m/Y', $row[11]),
            'country_of_birth'    => $row[12],
            'state_of_birth'    => $row[13],
            'referral_code'    => Settings::select('referral_code')->value('referral_code'),
            'commission' => Settings::select('agent_commission')->value('agent_commission'),
            'added_by' =>  Auth::user()->id,

            // 'added_by' => Hash::make($row[5])
        ]);
    
    }

    
}