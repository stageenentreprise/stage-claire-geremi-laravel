@extends('master')


@section('content')


{{-- Menu de navigation --}}
<div id="formation" class="text-center">
    <h1>{{$course->title}}</h1>
    <p>{{$course->description}}</p>

@foreach ($course->parts as $part)
    <button> Partie {{$part->numero}} : {{$part->title}} <br> </button>
    @foreach ($part->chapters as $chapter)
    <a href="{{url('/formation/'.$course->slug.'/'.$chapter->id )}}"> Chapitre {{$chapter->numero}} : {{$chapter->title}} </a> <br> 
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
<div class="embed-responsive embed-responsive-16by9">
    <video controls class="embed-responsive-item" allowfullscreen max-width: 100%>
        <source src="{{url('/chapter/video/'.$chapter->id)}}">
    </video>  
</div>
@endif
{!! $chapter->content !!}

    
    
</div>


<div class="row">
    <div class="col text-center">
        <a href="{{url('/formations')}}">Liste des formations</a>
    </div>
</div>

<div class="row">
    <div class="col text-center">
        <a href="{{url('/comment/'.$course->id.'/create')}}">Laisser un commentaire</a>
    </div>
</div>



@endsection
