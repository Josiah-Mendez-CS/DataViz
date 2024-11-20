<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade for authentication

class PanelController extends Controller
{
    /**
     * Show the initial page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        return view('panel'); // Adjust view name accordingly
    }

    /**
     * Update dynamicText1 with search keyword.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\View\View
     */
    public function updateText(Request $request)
    {
        // Validate the search keyword
        $validatedData = $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $dynamicText1 = $validatedData['search'] ?? 'Dynamic Text 1';

        return view('panel', compact('dynamicText1')); // Pass dynamicText1 to the view
    }
}
