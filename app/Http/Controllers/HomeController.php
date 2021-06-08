<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Brand;
use App\Pilot;
use App\Car;
use App\Mail\CarNotify;
use App\Mail\DeleteNotify;

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

    // edit car
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $pilots = Pilot::all();
        return view('pages.edit',compact('car','brands','pilots'));
    }

    // update car
    public function update(Request $request,$id)
    {
        $validated = $request ->validate([
            'name' => 'required|max:64',
            'model' => 'required|max:48',
            'kw' => 'required',
        ]);
        $car = Car::findOrFail($id);
        $car->update($validated);
        $car->brand()->associate($request->brand_id)->save();
        $car->pilots()->sync($request->pilot_id);

        $user = Auth::user();
        // invia una mail con dettagli della car modificata
        Mail::to('tua@mail.com')->send(new CarNotify($car));
        Mail::to($user->email)->send(new CarNotify($car));

        return redirect()->route('welcome');
    }

    // softDeletes
    public function deleteCar($id)
    {
        $car = Car::findOrFail($id);
    
        $user = Auth::user(); //invia una mail con dettagli car eliminata
        Mail::to($user->email)->send(new DeleteNotify($car));

        $car->delete();
        $car->save();
        return redirect()->route('welcome');
    }

    // softDeletes
    public function deletePilot($id)
    {
        $pilot = Pilot::findOrFail($id)
                        ->delete();
        return redirect()->route('welcome');
    }
}
