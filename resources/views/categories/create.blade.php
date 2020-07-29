@extends('master')


@section('content')


<form method="POST" action="{{url('category/insert')}}">
  @csrf
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Créer une catégorie</h5>
            <form class="form-signin">
              <div class="form-label-group">
                <label for="InputName1">Nom</label>
                <input type="text" class="form-control" id="InputName1" name="name" aria-describedby="NameHelp" value="{{old('name','')}}">
                @error('name') <small id="NameHelp" class="form-text text-muted">{{$message}}</small> @enderror
              </div>
   {{-- <input type="hidden" name="category_id" value="0"> --}}
   
   @include('categories.tree',['categories'=> $categories, "currentParent"=>0, "currentCategory"=>0])
   <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Soumettre</button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


@endsection
