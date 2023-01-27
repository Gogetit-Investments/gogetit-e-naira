<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;


class RoleController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.consumer-data.consumer-upload');
    }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


   
    


    public function allConsumers()
    {

        $consumers = DB::table('consumer_data')
        ->select('consumer_data.*', 'user.first_name as addedby', 'tier.tier_name')
            ->leftjoin('user', 'user.id', '=', 'consumer_data.added_by')
            ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
            ->get();
// return $users;
        return view('pages.consumer-data.consumer-list', compact('consumers') );

    }


}