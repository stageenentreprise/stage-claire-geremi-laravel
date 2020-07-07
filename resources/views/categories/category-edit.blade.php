
@extends('master')

@section('content')
    


<h2>Modifier la catégorie</h2>

<form method="POST" action="{{url('category/update/'.$category->id )}}">
    @csrf
      <div class="form-group">
        <label for="InputName1">Nom</label>
        <input type="text" class="form-control" id="InputName1" name="name" aria-describedby="NameHelp" value="{{old('name', $category->name)}}">
        @error('name') <small id="NameHelp" class="form-text text-muted">{{$message}}</small> @enderror
      </div>
     {{-- <input type="hidden" name="category_id" value="0"> --}}
     
     @include('categories.tree',['categories'=> $categories, "current"=>$category->category_id])
      <button type="submit" class="btn btn-primary">Modifier</button>
    </form>

{{-- <ul>
        @foreach ($categories as $category)
        
            <li>{{$category->name}} <a href="{{url("/category/edit")}}">Modifier</a>
            @include('categories.tree',['categories'=> $category->children]) </li>

        @endforeach
        
        
</ul>
<div class="button">
    <a href="{{url("/category/edit")}}">Modifier</a>
    {{-- <form action="{{url("/categories/delete/".$category->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Supprimer">
    </form>
    </div> --}}



@endsection