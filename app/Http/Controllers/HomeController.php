<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Pilot;
use App\Car;
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

    public function edit($id)
    {
        $car = Car::findOrFail($id);
        $brands = Brand::all();
        $pilots = Pilot::all();
        return view('pages.edit',compact('car','brands','pilots'));
    }

    public function update(Request $request,$id)
    {
        $validated = $request ->validate([
            'name' => 'required|max:64',
            'model' => 'required|max:48',
            'kw' => 'required',
        ]);
        $car = Car::findOrFail($id);
        $car->update($validated);
        $car->brand()->associate($request->brand_id)
            ->save();
        $car->pilots()->sync($request->pilot_id);
        return redirect()->route('welcome');
    }

    public function delete($id)
    {
        $car = Car::findOrFail($id);
        $car->deleted = true;
        $car->save();
        return redirect()->route('welcome');
    }

    public function deletePilot($id)
    {
        $pilot = Pilot::findOrFail($id)
            ->delete();
        return redirect()->route('welcome');
    }
}
