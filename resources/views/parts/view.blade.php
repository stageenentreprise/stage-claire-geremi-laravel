@extends('master')

@section('content')

    <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{$part->title}}</h5>
    @foreach ($chapters as $chapter)
        <p class="card-text">{{$chapter->title}} {{$chapter->numero}}</p>
    @endforeach
    
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>



@endsection

