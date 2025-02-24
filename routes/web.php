<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Halaman Company Profile";
});

Route::get('/login', function (){
    return "Halaman Login";
});
