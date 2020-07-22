@extends('master')


@section('content')



<div id="formation" class="text-center">
    <h1>{{$course->title}}</h1>
</div>



<div class="row">
    <div class="col text-center">
        <a href="{{url("/slap")}}">Liste des formations</a>
    </div>
</div>



@endsection
