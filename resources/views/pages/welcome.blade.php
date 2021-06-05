@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row">
        <h1 class="col-6 col-offset-3">Cars :</h1>
    </div>
    <div class="row d-flex justify-content-between">
        @foreach ($cars as $car)
            <div class="col-3 border m-3">
                <h5 class="mt-2">
                    {{$car->name}}
                    (KW : {{$car->kw}})
                    <a href="{{Route('edit',$car->id)}}">
                        &#9998;
                    </a>
                    <a href="{{Route('delete',$car->id)}}">
                        &#10060;
                    </a>
                </h5>
                <p>
                    <strong>
                        model : 
                    </strong>
                    {{$car->model}}
                </p>
                <p>
                    <strong>
                        Brand :
                    </strong>
                    {{$car->brand->name}}
                </p>
                <div class="pilots">
                    <ul>
                        @foreach ($car->pilots as $pilot)
                            <li>
                                <a href="{{Route('show',$pilot->id)}}">
                                    {{$pilot->name}}
                                    {{$pilot->lastname}}
                                </a>
                                <a style="font-size: 10px" href="{{Route('delete-pilot',$pilot->id)}}">
                                    &#10060;
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection