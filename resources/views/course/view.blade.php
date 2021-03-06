@extends('master')


@section('content')




<div class="card text-center w-50 float-left">
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
            @foreach ($part->chapters as $chapter)
                <h5>{{$chapter->numero}}  {{$chapter->title}}</h5>
            @endforeach
        @endforeach
        <div class="col text-center">
            <a href="{{url('/part/'.$course->id.'/create')}}" class="card-link col text-center btn btn-secondary">Ajouter une partie</a>
        </div><br>
        <div class="row">
            <a href="{{url('/course/edit/'.$course->id)}}" class="card-link col text-center btn btn-primary">Modifier la formation</a>
        </div>
        <a href="{{url('/comment/'.$course->id.'/create')}}">Laisser un commentaire</a>
    </div>
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


<div class="row">
    <div class="col text-center">
        <a href="{{url("/courses")}}">Liste des formations</a>
    </div>
</div>



@endsection
