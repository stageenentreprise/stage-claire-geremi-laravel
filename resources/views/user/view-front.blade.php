@extends('master')


@section('content')


{{-- Menu de navigation --}}
<div id="formation" class="text-center">
    <h1>{{$course->title}}</h1>
    <p>{{$course->description}}</p>

@foreach ($course->parts as $part)
    <button> Partie {{$part->numero}} : {{$part->title}} <br> </button>
    @foreach ($part->chapters as $chapter)
    <a href="{{url('/formation/slapslap/'.$chapter->id )}}"> Chapitre {{$chapter->numero}} : {{$chapter->title}} </a> <br> 
    @endforeach
    <br>
@endforeach

</div>

<div class="container border border-success text-center" >
{{$chapter->part->numero}}
<h1>Titre de la partie : {{$chapter->part->title}} </h1>
Description de la partie : {{$chapter->part->description}} <br>
Titre du chapitre : {{$chapter->title}} <br>
@if ($chapter->video)
    <video controls width="95%" height="35vh">
        <source src="{{url('/chapter/video/'.$chapter->id)}}">
    </video>    
@endif
{{!! $chapter->content !!}}

    
    
</div>


<div class="row">
    <div class="col text-center">
        <a href="{{url("/formations")}}">Liste des formations</a>
    </div>
</div>



@endsection
