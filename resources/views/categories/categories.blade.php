
@extends('master')

@section('content')
    


<h2>Catégories</h2>
@include('categories.tree-list',['categories'=> $categories])

<a href="/stage/stage-claire-geremi-laravel/public/category/create">Ajouter une catégorie</a>


@endsection