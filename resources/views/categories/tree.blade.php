<ul>
    @foreach ($categories as $category)
        <li><input type="radio" name="category_id" value="{{$category->id}}"> {{$category->name}}
            @include('categories.tree',['categories'=> $category->children])
        </li> 
    @endforeach
  </ul>