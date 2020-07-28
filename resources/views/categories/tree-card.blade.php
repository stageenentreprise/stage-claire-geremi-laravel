@foreach ($categories as $category)
<div class="row">
    <div class="col-lg-4 col-sm-6 mb-4">
      <div class="card h-100">
      <a href="#"><img width="700" height="250" class="card-img-top" src="{{url('')}}" alt=""></a>
        <div class="card-body">
          <h4 class="card-title">
            <a href="{{url('/stage/stage-claire-geremi-laravel/public/category/consultation/')}}">HTML/CSS</a>
          </h4>
          <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
        </div>
      </div>
    </div>

@include('categories.tree-option',['categories'=> $category->children, "separateur"=>"│  ".$separateur, "currentCategory"=> $currentCategory ?? ''])

@endforeach