<ul>
    @foreach ($categories as $category)
        
    @if ($category->id != $currentCategory)
        <li><input type="radio" name="category_id" value="{{$category->id}}" @if ($category->id==$currentParent) checked @endif> {{$category->name}} 
               
            @include('categories.tree',['categories'=> $category->children, "currentParent"=>$currentParent, "currentCategory"=>$currentCategory])
            
        </li> 
    @endif  
    @endforeach
  </ul>
 
  