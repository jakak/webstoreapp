<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Webkul\Customer\Mail\VerificationEmail;
use Illuminate\Support\Facades\Mail;

Route::get('testing-email', function () {
    $verificationData['email'] = 'jamesjay4199@gmail.com';
    $verificationData['token'] = md5(uniqid(rand(), true));

    Mail::send(new VerificationEmail($verificationData));
});
