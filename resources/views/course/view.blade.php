@extends('master')


@section('content')




<div class="card text-center" style="width: 18rem;">
    <div class="card-body col text-center">
        <h3 class="card-title">{{$course->title}}</h3><br>
        <h4 class="card-subtitle mb-2 text-muted">Description : </h4>
        <h5>{{$course->description}}</h5><br>
        <h4 class="card-subtitle mb-2 text-muted">Parties : </h4>
        @foreach ($parts as $part)
            <h5>{{$part->numero}}. {{$part->title}} <a href="{{url('/part/edit/'.$part->id)}}" onclick="return confirm('Confirmez-vous la suppression de cette catégorie?');" class="btn btn-danger float-left">Supprimer</a> <a href="{{url('/part/edit/'.$part->id)}}" class="btn btn-primary">Modifier</a></h5>
        @endforeach
        
        <div class="col text-center">
            <a href="{{url('/part/'.$course->id.'/create')}}" class="card-link col text-center btn btn-secondary">Ajouter une partie</a>
        </div><br>
        <div class="row">
            <a href="{{url('/course/edit/'.$course->id)}}" class="card-link col text-center btn btn-primary">Modifier la formation</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col text-center">
        <a href="{{url("/courses")}}">Liste des formations</a>
    </div>
</div>



@endsection
