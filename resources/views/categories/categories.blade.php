
@extends('master')

@section('content')
    


<h2>Catégories</h2>
@include('categories.tree-list',['categories'=> $categories])


@endsection