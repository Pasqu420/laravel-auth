<?php

namespace App\Http\Controllers;
use App\Pilot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pages.home');
    }
    public function show($id)
    {
        $pilot = Pilot::findOrFail($id);
        return view('pages.show',compact('pilot'));
    }
}
