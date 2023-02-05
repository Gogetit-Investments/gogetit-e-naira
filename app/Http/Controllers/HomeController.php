<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use DB;

class HomeController extends Controller
{
    public function index() 
    {
        return view('dashboard.index');
    }

    // public function settings() 
    // {
    //     return view('pages.settings');
    // }

    public function settings_list() {
        $settings = DB::select('select * from settings');
        return view('pages.settings-list',['settings'=>$settings]);
     }

    public function update_settings(Request $request)
    {
        // $settings = update($request->all());

        
        return back()->with('success', 'Settings updated successfully');
    }


    public function settings($id) {
        $settings = DB::select('select * from settings where id = ?',[$id]);
        return view('pages.settings',['settings'=>$settings]);
     }

//     public function updateSettings(Request $request)
//     {
//       if (Settings::where('id', $request->id)->exists()) {
//         $settings = Settings::find($request->id);
//         $settings->app_name = is_null($request->app_name) ? $settings->app_name : $request->app_name;
//         // $settings->ceo_name = is_null($request->ceo_name) ? $settings->ceo_name : $request->ceo_name;
//         // $settings->referral_code = is_null($request->referral_code) ? $settings->referral_code : $request->referral_code;
//         // $settings->agent_commission = is_null($request->agent_commission) ? $settings->agent_commission : $request->agent_commission;
  
  
//         $settings->save();
//         return redirect('/settings')->with('success', 'Settings updated successfully');
//     //     return response()->json([
//     //       "message" => "Address updated successfully"
//     //     ], 200);
//     //   } else {
//     //     return response()->json([
//     //       "message" => "Address not found"
//     //     ], 404);
//     //   }
//     }
// }

public function updateSettings(Request $request, $id) {
    $app_name = $request->input('app_name');
    $ceo_name = $request->input('ceo_name');
    $referral_code = $request->input('referral_code');
    $agent_commission = $request->input('agent_commission');
    DB::update('update settings set app_name = ?, ceo_name = ?, referral_code = ?, agent_commission = ? where id = ?',[$app_name, $ceo_name, $referral_code, $agent_commission, $id]);
    return back()->with('success', 'Settings updated successfully');
 }


}