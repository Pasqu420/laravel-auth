<?php

namespace App\Http\Controllers;
use App\Car;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function welcome()
    {
        $cars = Car::where('deleted',false)->get();
        return view('pages.welcome',compact('cars'));
    }
}
