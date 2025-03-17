<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\ActivityController::class, 'index']);
Route::get('/home', [App\Http\Controllers\ActivityController::class, 'index'])->name('home');


Route::resource('/activities', \App\Http\Controllers\ActivityController::class);
Route::post('/activities/delete', [\App\Http\Controllers\ActivityController::class, 'delete'])->name('activities.delete');
Route::get('/activities/list/table', [\App\Http\Controllers\ActivityController::class, 'listDataTable'])->name('activities.datatable');
Route::get('/activities/list/table_filtered/{show_closed}', [\App\Http\Controllers\ActivityController::class, 'listDataTableFiltered'])->name('activities.datatableFiltered');



