<?php

use Illuminate\Support\Facades\Route;
use Uniqueginun\Laraflow\Http\Controllers\WorkflowCPController;
use Uniqueginun\Laraflow\Http\Middlewares\SaveStepDataToSession;

Route::prefix(config('laraflow.route-prefix'))
    ->middleware(config('laraflow.middlewares'))
    ->as('laraflow.')
    ->group(function () {
    Route::get('/cp', [WorkflowCPController::class, 'home'])->name('cp-home');

    Route::match(
        ['GET', 'POST'],
        '/cp/services/create',
        [WorkflowCPController::class, 'create']
    )->name('cp-service.create')->middleware(SaveStepDataToSession::class);
});
