<?php

namespace App\Http\Controllers;

use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;


class SearchQueryController extends Controller
{

public function search(Request $request){
    // Get the search value from the request
    $search = $request->search;
    $start_date=$request->start_date;
    $end_date=$request->end_date;
    // Search in the title and body columns from the posts table
    $query = Consumer::query()
        ->where('added_by', '=', $search)
        ->whereBetween('created_at', [$start_date, $end_date])
        ->get();

    // Return the search view with the resluts compacted
    // return view('pages.search');
    return view('pages.search', compact('query'));
}
}