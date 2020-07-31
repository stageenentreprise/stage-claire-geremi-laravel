@extends('master')

@section('content')
    
<br><br>
<div id="formation" class="text-center rounded border border-success mb-2 w-50 float-left">
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
            <a href="{{url('/formation/'.$course->slug.'/'.$chapter->id )}}">Débuter la formation</a>
        @endif
        
    @endforeach
@endforeach
</div>

<div class="card text-center w-50 float-left">
    <div class="card-body col text-center">
        <h3 class="card-title">Commentaires</h3><br>
        @foreach ($course->comments as $comment)
            <h5> 
                {{$comment->user->name}}
                {{$comment->content}} {{$comment->rate}}
             </h5>
        @endforeach
        
    </div>
</div>

@endsection