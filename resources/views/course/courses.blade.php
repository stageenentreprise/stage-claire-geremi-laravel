
@extends('master')

@section('content')
    


<h2>Formations</h2>

<ul>
        @foreach ($courses as $course)
        
            <li>
            Titre : {{$course->title}}  Description : {{$course->description}}
            {{-- @include('categories.tree-edit',['categories'=> $category->children])  --}}
            </li>
         
        @endforeach
        
        
</ul>

@endsection