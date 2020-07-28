@extends('master')

@section('content')
    
<div id="formation" class="text-center">
    <h1>{{$course->title}}</h1>
    <p>{{$course->description}}</p>
@foreach ($course->parts as $part)
    <h1>Partie {{$part->numero}} : {{$part->title}} </h1>
    @foreach ($part->chapters as $chapter)
        <h2>Chapitre {{$chapter->numero}} : {{$chapter->title}} </h2>
    @endforeach
    <br>
@endforeach

{{$countChapter = 0}}
@foreach ($course->parts as $part)
    @foreach ($part->chapters as $chapter)
        @if ($countChapter === 0)
            <a href="{{url('/formation/'.$course->slug.$chapter->id )}}">Débuter la formation</a>
        @endif
        
    @endforeach
@endforeach


</div>


@endsection