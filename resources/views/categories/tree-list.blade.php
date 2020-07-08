<ul>
    @foreach ($categories as $category)

        <li> {{$category->name}} <a href="{{url('/category/edit/'.$category->id)}}">Modifier</a>

           @if(count($category->courses)==0 && count($category->children)==0)

                <a href="{{url("/category/delete/".$category->id)}}">Supprimer</a>
           @endif 

        @include('categories.tree-list',['categories'=> $category->children,])
                 
        </li> 
    @endforeach
  </ul>
