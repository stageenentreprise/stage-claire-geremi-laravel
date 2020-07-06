
@extends('master')

@section('content')
    


<h2>Catégories</h2>

<ul>
        @foreach ($categories as $category)
        
            <li>{{$category->name}}
            @include('categories.tree',['categories'=> $category->children]) </li>

        @endforeach
        
        
</ul>
<div class="button">
    <a href="{{url("/categories/category-edit/")}}">Modifier</a>
    {{-- <form action="{{url("/categories/delete/".$category->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Supprimer"> --}}
    </form>
    </div>



@endsection