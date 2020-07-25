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

<div class="container border border-success text-center" >
{{$partNumero}}
Titre de la partie : {{$course->parts[$partNumero - 1]->title}} <br>
Description de la partie : {{$course->parts[$partNumero - 1]->description}} <br>
Titre du chapitre : {{$course->parts[$partNumero - 1]->chapters[$chapterNumero - 1]->title}} <br>
{{!! $course->parts[$partNumero - 1]->chapters[$chapterNumero - 1]->content !!}}

    
    
</div>


<div class="row">
    <div class="col text-center">
        <a href="{{url("/formations")}}">Liste des formations</a>
    </div>
</div>



@endsection
