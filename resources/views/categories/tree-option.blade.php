
    @foreach ($categories as $category)
        <option value="{{$category->id}}" 
        @if ($category->id == $currentCategory ?? '' ?? '')
            selected
        @endif > {{$separateur}} {{$category->name}}
        </option>
        @include('categories.tree-option',['categories'=> $category->children, "separateur"=>"│  ".$separateur, "currentCategory"=> $currentCategory ?? '' ])
    @endforeach
