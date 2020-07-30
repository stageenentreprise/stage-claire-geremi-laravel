@extends('master')

@section('content')

    
@foreach ($courses as $course)

<div class="card text-center float-left" style="width: 18rem;">
    <div class="card-body col text-center">
        <h3 class="card-title">{{$course->title}}</h3><br>
        <h4 class="card-subtitle mb-2 text-muted">Description : </h4>
        <h5>{{$course->description}}</h5><br>
        <h4 class="card-subtitle mb-2 text-muted">Parties : </h4>
        
        @foreach ($course->parts as $part)
        @csrf
            <h5>{{$part->numero}}. {{$part->title}}</h5>
        
        <div class="col text-center">
            {{-- @foreach ($part->chapters as $chapter) --}}
                <a href="{{url('/formation/'.$course->slug )}}" class="card-link col text-center btn btn-secondary">Consulter </a>
            {{-- @endforeach --}}
        @endforeach
        {{-- {{$course->firstPart()}} --}}
        {{-- {{dd ( $course->firstPart() ) }} --}}
        {{-- {{$course->firstPart->firstChapter()}} --}}
        {{-- {{ ( $course->firstPart() )->firstChapter() }} --}}
        {{-- {{$part->firstChapter()}} --}}
        {{-- {{$firstPart}} --}}
        </div><br>
    </div>
</div>

@endforeach

@endsection

