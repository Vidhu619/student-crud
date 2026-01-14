<?php

use App\Http\Controllers\StudentController;

Route::middleware(['auth'])->group(function () {

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');

    Route::get('/students/list', [StudentController::class, 'list'])->name('students.list');

    Route::post('/students', [StudentController::class, 'store'])->name('students.store');

    Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

});

