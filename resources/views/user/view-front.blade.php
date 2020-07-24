@extends('master')


@section('content')



<div id="formation" class="text-center">
    <h1>{{$course->title}}</h1>
    <p>{{$course->description}}</p>
</div>
@foreach ($course->parts as $part)
    Partie {{$part->numero}} : {{$part->title}} <br>
    @foreach ($part->chapters as $chapter)
        Chapitre {{$chapter->numero}} : {{$chapter->title}} <br> 
    @endforeach
    <br>
@endforeach




<div class="row">
    <div class="col text-center">
        <a href="{{url("/slap")}}">Liste des formations</a>
    </div>
</div>



@endsection
