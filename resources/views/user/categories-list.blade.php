@extends('master')

@section('content')
    
<h2>Catégories</h2>
@include('categories.tree-user',['categories'=> $categories, "separateur"=>"│  ".$separateur])

@endsection