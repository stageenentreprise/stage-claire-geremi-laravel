<ul>
    @foreach ($categories as $category)
        
            
        <li><input type="radio" name="category_id" value="{{$category->id}}" @if ($category->id==$current) checked @endif> {{$category->name}} 
            
            @include('categories.tree',['categories'=> $category->children, "current"=>$current])
            
        </li> 
        
    @endforeach
  </ul>
 
  