@extends('master')


@section('content')
<h2>Créer une catégorie</h2>

<form method="POST" action="{{url('category/insert')}}">
  @csrf
    <div class="form-group">
      <label for="InputName1">Nom</label>
      <input type="text" class="form-control" id="InputName1" name="name" aria-describedby="NameHelp" value="{{old('name','')}}">
      @error('name') <small id="NameHelp" class="form-text text-muted">{{$message}}</small> @enderror
    </div>
   {{-- <input type="hidden" name="category_id" value="0"> --}}
   
   @include('categories.tree',['categories'=> $categories])
    <button type="submit" class="btn btn-primary">Soumettre</button>
  </form>



@endsection
