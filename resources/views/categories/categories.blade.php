
@extends('master')

@section('content')
    


<h2>Catégories</h2>
<a href="{{url('category/create')}}" class="btn btn-primary btn-lg active btn-block" role="button" aria-pressed="true">Ajouter une catégorie</a>
@include('categories.tree-list',['categories'=> $categories])




@endsection