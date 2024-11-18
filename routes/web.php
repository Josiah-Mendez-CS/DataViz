<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ScatterPlotController;
use App\Http\Controllers\ChartController;

Route::get('/', [PanelController::class, 'index'])->name('panel.index');


Route::get('/updateText', [PanelController::class, 'updateText'])->name('panel.updateText');

// Route::get('/scatter-plot', [ScatterPlotController::class, 'showScatterPlot']);
// Route::get('/fetch-scatter-data', [ScatterPlotController::class, 'fetchScatterData']);
Route::get('/chart', [ChartController::class, 'index']);


