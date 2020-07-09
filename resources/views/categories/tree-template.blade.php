
    @foreach ($categories as $category)
        @include('categories.tree-option',['categories'=> $category->children])
    @endforeach
