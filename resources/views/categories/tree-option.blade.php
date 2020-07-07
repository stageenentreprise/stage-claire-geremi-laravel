
    @foreach ($categories as $category)
        <li><option> {{$category->name}}
            @include('categories.tree-option',['categories'=> $category->children])
            </option>
        </li> 
    @endforeach
