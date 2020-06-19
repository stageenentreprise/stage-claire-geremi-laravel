<ul>
    @foreach ($categories as $category)
        <li> {{$category->name}}
            @include('categories.tree',['categories'=> $category->children, ])
            
        </li> 
    @endforeach
  </ul>