
<ul>
    @foreach ($categories as $category)
        <li> {{$category->name}} <a href="{{url('/category/edit/'.$category->id)}}">Modifier</a>
           @if(count($category->courses)==0 && count($category->children)==0)
           <form action="{{url("/category/delete/".$category->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" value="Supprimer" onclick="return confirm('Confirmez-vous la suppression de cette catégorie?');">
        </form>
           @endif 
            @include('categories.tree-list',['categories'=> $category->children,])<br>
        </li> 
    @endforeach
  </ul>
 