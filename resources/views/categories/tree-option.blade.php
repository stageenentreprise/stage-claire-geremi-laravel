
    @foreach ($categories as $category)
        <option value="{{$category->id}}"> {{$separateur}} {{$category->name}}
        </option>
        @include('categories.tree-option',['categories'=> $category->children, "separateur"=>"│  ".$separateur])
    @endforeach
