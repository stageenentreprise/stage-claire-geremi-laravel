<ul>
    @foreach ($categories as $category)
        <li> {{$category->name}} <a href="{{url('/category/edit/'.$category->id)}}">Modifier</a>
            @include('categories.tree-list',['categories'=> $category->children,])
                 
        </li> 
    @endforeach
  </ul>
