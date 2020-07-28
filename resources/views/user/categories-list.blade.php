@extends('master')

@section('content')
    
<h2>Catégories</h2>

@include('categories.tree-card',['categories'=> $categories])



@endsection