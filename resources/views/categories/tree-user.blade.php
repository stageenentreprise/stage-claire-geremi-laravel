
    @foreach ($categories as $category)
        <li>
        {{$category->name}}
        @include('categories.tree-option',['categories'=> $category->children, "separateur"=>"│  ".$separateur, "currentCategory"=> $currentCategory ?? ''])
        </li>
    @endforeach
