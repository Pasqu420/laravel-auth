@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="col-6 col-offset-3">Pilot :</h1>
    </div>
    <div class="row">
        <h3 class="col-12">
            {{$pilot->name}}
            {{$pilot->lastname}}
        </h3>
        <p class="col-12">
            <strong>
                Nationality :
            </strong>
            {{$pilot->nationality}}
        </p>
        <p class="col-12">
            <strong>
                CARS :
            </strong>
        </p>
        <ul>
            @foreach ($pilot->cars as $car)
                <li>
                    {{$car->name}}
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection