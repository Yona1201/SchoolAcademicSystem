<?php

use App\Http\UserControllers;

Route::get('/users', [UserController ::class, 'index']);
Route::get('/users/(id)', [UserController ::class, 'show']);
?>
