<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(UserServices $userServices)
    {
        $data = 'data';
        dd($data);
        return view('index',compact('data'));
    }

    public function show(UserServices $userServices)
    {
        $data ='data specific pokemon';
        dd($data);
        return view('pokemon',compact('data'));
    }

    public function redirect()
    {
        return redirect('/');
    }
}
