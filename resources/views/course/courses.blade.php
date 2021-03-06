
@extends('master')

@section('content')
    
<h1 class="text-center">Formations</h1>    
<a class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true" href="{{url('/course/create')}}">Ajouter une formation</a> <br>
@foreach ($courses as $course)

    <div class="card text-center float-left" style="width: 18rem;">
        <div class="card-body col text-center">
            <h3 class="card-title">{{$course->title}}</h3><br>
            <h4 class="card-subtitle mb-2 text-muted">Description : </h4>
            <h5>{{$course->description}}</h5><br>
            <div class="col text-center">
                <a href="{{url('/part/'.$course->id.'/create')}}" class="card-link col text-center btn btn-secondary">Ajouter une partie</a>
            </div><br>
            <h4 class="card-subtitle mb-2 text-muted">Parties : </h4>
            
            @foreach ($course->parts as $part)
            <form action="{{url('/part/delete/'.$part->id)}}" method="POST">
            @csrf
            @method('delete')
                <h5>{{$part->numero}}. {{$part->title}} <button type="submit" onclick="return confirm('Confirmez-vous la suppression de cette catégorie?');" class="btn btn-danger float-left">Supprimer</button>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="courseid" value="{{ $part->course_id }}" required>
                </form>
                <a href="{{url('/part/edit/'.$part->id)}}" class="btn btn-primary">Modifier</a> </h5>
                <div class="col text-center">
                {{-- @foreach ($course->parts->chapters as $chapter)
                    {{$chapter}}
                @endforeach --}}
                <a href="{{url('/part/'.$part->id.'/addchapter')}}" class="card-link col text-center btn btn-warning">Ajouter un chapitre</a>
                </div><br>
            @endforeach
            
            <div class="row">
                <a href="{{url('/course/edit/'.$course->id)}}" class="card-link col text-center btn btn-primary">Modifier la formation</a>
            </div>
        </div>
    </div>


@endforeach



@endsection