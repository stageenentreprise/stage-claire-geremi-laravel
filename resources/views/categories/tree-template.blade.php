
    @foreach ($categories as $category)
        @include('categories.tree-option',['categories'=> $category->children, "separateur"=>"│  ".$separateur, "currentCategory"=> $currentCategory ?? ''])
    @endforeach
