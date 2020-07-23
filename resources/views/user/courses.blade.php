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
        <form action="{{url('/part/delete/'.$part->id)}}" method="POST">
        @csrf
        @method('delete')
            <h5>{{$part->numero}}. {{$part->title}}</h5>
        @endforeach
        <div class="col text-center">
            <a href="{{url('/slap/view/'.$course->slug.'/')}}" class="card-link col text-center btn btn-secondary">Consulter</a>
        </div><br>
    </div>
</div>

@endforeach

@endsection

