<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("test");
});

Route::get('/login', function (){
    return view("login");
})->name("login");

Route::get('/test', function (){
    return view("layouts.store");
})->name("test");

Route::get('/landing', function (){
    return view("landing");
})->name("landing");

Route::get('/etalase', function () {
    return view("etalase");
})->name("etalase");