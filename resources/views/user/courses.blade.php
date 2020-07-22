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
            <h5>{{$part->numero}}. {{$part->title}} <button type="submit" onclick="return confirm('Confirmez-vous la suppression de cette catégorie?');" class="btn btn-danger float-left">Supprimer</button>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="courseid" value="{{ $part->course_id }}" required>
            </form>
            <a href="{{url('/part/edit/'.$part->id)}}" class="btn btn-primary">Modifier</a> </h5>
        @endforeach
        <div class="col text-center">
            <a href="{{url('/slap/view/'.$course->id.'/')}}" class="card-link col text-center btn btn-secondary">Consulter</a>
        </div><br>
    </div>
</div>

@endforeach

@endsection

