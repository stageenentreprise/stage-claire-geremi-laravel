
@extends('master')

@section('content')
    


<h2>Catégories</h2>
@include('categories.tree-list',['categories'=> $categories])

<a href="{{url('category/create')}}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Ajouter une catégorie</a>


@endsection