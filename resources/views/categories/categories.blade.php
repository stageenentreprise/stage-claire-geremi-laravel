
@extends('master')

@section('content')
    


<h2>Catégories</h2>

<ul>
        @foreach ($categories as $category)
        
            <li>{{$category->name}}
            @include('categories.tree-edit',['categories'=> $category->children]) </li>
         
        @endforeach
        
        
</ul>

@endsection