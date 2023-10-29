<?php


use Domains\Customer\Http\Controllers\Api\CustomerController;
use Illuminate\Support\Facades\Route;

Route::apiResource('customers', CustomerController::class);
