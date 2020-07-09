@extends('master')


@section('content')




<div class="card text-center" style="width: 18rem;">
    <div class="card-body col text-center">
        <h5 class="card-title">{{$course->title}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$course->category_id}}</h6>
        <p class="card-text">{{$course->description}}</p>
        <div class="col text-center">
            <a href="{{url('/part/'.$course->id.'/create')}}" class="card-link col text-center btn btn-secondary">Ajouter une partie</a>
        </div><br>
        <div class="row">
            <a href="{{url('/course/edit/'.$course->id)}}" class="card-link col text-center btn btn-primary">Modifier</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col text-center">
        <a href="{{url("/courses")}}">Liste des formations</a>
    </div>
</div>



@endsection
