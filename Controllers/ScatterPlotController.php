<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScatterPlotController extends Controller
{
    public function showScatterPlot()
{
    // Just return the view without data for AJAX call
    return view('scatter_plot');
}

public function fetchScatterData()
{
    // Sample data
    $data = [
        ['gene_symbol' => '4921509C19Rik', 'female_femur' => -38.84, 'male_femur' => -7.54],
        ['gene_symbol' => '4930563E22Rik', 'female_femur' => 2.61, 'male_femur' => 14.02],
        ['gene_symbol' => 'Abca7', 'female_femur' => 9.05, 'male_femur' => -3.19],
        // Add more data as needed
    ];

    // Return data as JSON
    return response()->json($data);
}
}
