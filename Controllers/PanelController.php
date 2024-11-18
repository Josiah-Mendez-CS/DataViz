<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    // Show the initial page
    public function index()
    {
        return view('panel');  // Adjust view name accordingly
    }

    // Update dynamicText1 with search keyword
    public function updateText(Request $request)
    {
        $dynamicText1 = $request->get('search', 'Dynamic Text 1');
        return view('panel', compact('dynamicText1'));  // Pass dynamicText1 to the view
    }
}
