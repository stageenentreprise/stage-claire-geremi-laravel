@extends('master')


@section('content')

<form action="{{ url('/course/update/'.$course->id) }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Titre de la formation ({{ old('title', $course->title) }})</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title', $course->title) }}" placeholder="Une superbe formation !" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Catégorie {{ old('category_id', $course->category_id) }}</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category_id"  >
        @include('categories.tree-option',['categories'=> $categories, "separateur"=>"├─", "currentCategory"=> $course->category_id])
        
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ old('description', $course->description) }}</textarea>
      @error('description')
          {{ $message }}
      @enderror
    </div>

    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>

  </form>

@endsection