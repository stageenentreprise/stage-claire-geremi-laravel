
<ul class="list-group list-group-horizontal">
    @foreach ($categories as $category)
        <li class="list-group-item"> {{$category->name}} <button type="button" class="btn btn-warning btn-sm"><a href="{{url('/category/edit/'.$category->id)}}">Modifier</a></button>
           @if(count($category->courses)==0 && count($category->children)==0)
           <form action="{{url("/category/delete/".$category->id)}}" method="post">
            @csrf
            @method('delete')
            <input type="submit" class="btn btn-danger btn-sm" value="Supprimer" onclick="return confirm('Confirmez-vous la suppression de cette catégorie?');">
        </form>
           @endif 
            @include('categories.tree-list',['categories'=> $category->children,])<br>
        </li> 
    @endforeach
  </ul>
 