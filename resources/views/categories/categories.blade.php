
@extends('master')

@section('content')
    


<h2>Catégories</h2>
@include('categories.tree-list',['categories'=> $categories])

{{-- <div class="button">
    <a href="{{url("/category/edit")}}">Modifier</a>
    {{-- <form action="{{url("/categories/delete/".$category->id)}}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Supprimer">
    
    </div> --}}


@endsection