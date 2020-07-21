@extends('master')

@section('content')
    

<h2>Catégories</h2>
{{-- @if ($currentCategory2->category_id != null)
        {{ $category_id = $category}}
        {{ $category }}
        {{-- {{ $currentCategory2 }} = {{ $currentCategory2->category_id }} --}}
    {{-- @endif --}}
<?php
use App\Category;
    $currentCategoryUpdate = $currentCategory2;
    echo '<nav aria-label="breadcrumb">
  <ol class="breadcrumb">';
    while ($currentCategoryUpdate->category_id != null) {
        
        $currentCategoryUpdate = Category::findOrFail($currentCategoryUpdate->category_id);
        // echo $currentCategoryUpdate->name;
        // echo '<li class="breadcrumb-item"><a href=""</a>' . $currentCategoryUpdate->name . '</a></li>';
        echo '<li class="breadcrumb-item"><a href="/stage/stage-claire-geremi-laravel/public/gnia/' ?> {{$currentCategoryUpdate->id}} <?php echo '"</a>' . $currentCategoryUpdate->name . '</a></li>';
        
    } 
    echo '<li class="breadcrumb-item active"><a href="">' . $currentCategory2->name . '</a></li></ol></nav>';

?>
{{-- {{ $currentCategory2->name }} <br> --}}
    @foreach ($currentCategory2->children as $category)
    <a href="/stage/stage-claire-geremi-laravel/public/slap/{{$category->id}}">{{ $category->name }}</a>
    @endforeach



@endsection