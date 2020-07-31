@extends('master')

@section('content')
    {{-- @dd($categoryArray) --}}

<h2>Catégories</h2>

<?php
use App\Category;
    $currentCategoryUpdate = $currentCategory2;
    echo '<nav aria-label="breadcrumb">
  <ol class="breadcrumb">';
    while ($currentCategoryUpdate->category_id != null) {
        $currentCategoryUpdate = Category::findOrFail($currentCategoryUpdate->category_id);
        echo '<li class="breadcrumb-item">'?><a href="{{url('/category/consultation/'. $currentCategoryUpdate->slug)}} <?php echo '"</a>' . $currentCategoryUpdate->name . '</a></li>';
        
    } 
    echo '<li class="breadcrumb-item active"><a href="">' . $currentCategory2->name . '</a></li></ol></nav>';

?>

    

    @foreach ($currentCategory2->children as $category)
    <a href="{{url('/category/consultation/'.$category->slug)}}">{{ $category->name }}</a>
    @endforeach

    

    {{-- @foreach ($categoryArray as $item)
        {{$item}}
    @endforeach --}}

<img class="mx-auto d-block" src="{{url('/images/categories/'.$currentCategory2->slug.'.png')}}">

<br><br><h2 class="text-center">Liste des formations relatives à la catégorie {{$currentCategory2->name}}</h2>

    {{-- @foreach($actualCategory->courses as $course) --}}
    @foreach ($courses as $course)
    <div class="card text-center float-left" style="width: 18rem; margin: 1rem;">
        <div class="card-body col text-center">
            <h3 class="card-title">{{$course->title}}</h3><br>
            <h4 class="card-subtitle mb-2 text-muted">Description : </h4>
            <h5>{{$course->description}}</h5><br>
            <a href="{{url('/formationpreview/'.$course->slug)}}">Accéder à la formation</a>
        </div>
    </div>        
    @endforeach



@endsection