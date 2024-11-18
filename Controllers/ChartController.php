<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function index()
    {
        // Data from your table
        $data = [
            'geneSymbols' => [
                '4921509C19Rik', '4930563E22Rik', 'Abca7', 'Acap1', 'Acsf2', 'Acsm2', 'Adck2', 'Adck5',
                'Adgrb2', 'Adora2b', 'Ahrr', 'Akap11', 'Akr1b8', 'Akr1d1', 'Al464131', 'Arhgef10',
                'Arrb1', 'Arsk'
            ],
            'femaleFemur' => [
                -38.84, 2.61, 9.05, 2.48, 14.33, 30.54, -15.6, 19.85, 2.89, -20.21, -14.31, 21.97,
                31.33, 33.48, 20.62, -25.36, -25.61, -12.34
            ],
            'maleFemur' => [
                -7.54, 14.02, -3.19, 14.42, -6.07, 31.15, 2.76, 14.02, 22.9, -23.43, 24.98, 50.67,
                -7.15, 34.54, 18.39, -17.52, -31.08, -4.34
            ]
        ];

        return view('chart', compact('data'));
    }
}
