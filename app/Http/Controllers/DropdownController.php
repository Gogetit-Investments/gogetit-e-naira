<?php
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\{Country, State, Lga};
class DropdownController extends Controller
{
    public function index()
    {
        $data['country'] = Country::get(["country_code", "country_name"]);
        return view('pages.consumer-data.consumer_single-upload', $data);
    }
    public function fetchState(Request $request)
    {
        $data['state'] = State::where("country_code",$request->country_code)->get(["state_name", "state_code"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['lga'] = Lga::where("state_code",$request->state_code)->get(["lga_name", "lga_code"]);
        return response()->json($data);
    }
}