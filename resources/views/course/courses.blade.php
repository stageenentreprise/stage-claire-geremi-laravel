
@extends('master')

@section('content')
    


<h2>Formations</h2>

<ul>
        @foreach ($courses as $course)
        
            <li>
             Titre : {{$course->title}}  Description : {{$course->description}} category_id : {{$course->category_id}}
             <a href="{{url("/course/view/".$course->id)}}">Plus d'informations</a>
            {{-- {{$course}} --}}
            {{-- @include('categories.tree-edit',['categories'=> $category->children])  --}}
            </li>
         
        @endforeach
        
        
</ul>

@endsection