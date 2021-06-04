@extends('layouts.main')
@section('content')
        <div class="col-8 mx-auto text-center">
            <form action="{{Route('update',$car->id)}}" method="post">
        
                @csrf
                @method('post')
        
                <div>
                    <label for="name">NAME</label>
                    <input class="mt-5" type="text" name="name" id="name" value="{{$car->name}}" required>
                </div>
        
                <div>
                    <label for="model">MODEL</label>
                    <input class="mt-5" type="text" name="model" id="model" value="{{$car->model}}" required>
                </div>
        
                <div>
                    <label for="kw">KW</label>
                    <input class="mt-5" type="number" name="kw" id="kw" value="{{$car->kw}}" required>
                </div>
        
                <div>
                    <label for="brand_id">BRAND</label>
                    <select class="mt-5" name="brand_id" id="brand_id" required>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->id}}"
                                @if ($car->brand->id== $brand->id)
                                    selected
                                @endif
                            > {{$brand->name}} ({{$brand->nationality}})
                            </option>
                        @endforeach
                    </select>    
                </div>
        
                <div>
                    <div class="row justify-content-center mt-5">
                        @foreach ($pilots as $pilot)
                            <div class="col-3 col-offset-1">
                                <label for="pilot_id[]">{{$pilot->name}} {{$pilot->lastname}}</label>
                                <input type="checkbox" name="pilot_id[]" id="pilot_id[]" value="{{$pilot->id}}"
                                    @foreach ($car->pilots as $carPilot)
                                        @if ($carPilot->id == $pilot->id)
                                            checked
                                        @endif
                                    @endforeach
                                >
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit">Invia</button>
            </form> 
        </div>
@endsection