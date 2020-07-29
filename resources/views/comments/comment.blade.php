@extends('master')

@section('content')

<form method="POST" action="{{url('/comment/'.$course->id.'/insert')}}">
  
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Laisser un commentaire</h5>
            <hr class="style1"><br>
            <form class="form-signin">
              
  <select name="rate">
    <option value="5">☆☆☆☆☆</option>
    <option value="4">☆☆☆☆</option>
    <option value="3">☆☆☆</option>
    <option value="2">☆☆</option>
    <option value="1">☆</option>
  </select>
  <hr class="style1"><br>

  <div class="form-group">
   <textarea class="form-control" name="content" rows="3" placeholder="Votre commentaire..."></textarea><br />
   <hr class="style1"><br>
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire"/>
  </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

@endsection