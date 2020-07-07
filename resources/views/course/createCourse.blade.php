@extends('master')


@section('content')

<form action="{{ url('/course/insert') }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Titre de la formation</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}" placeholder="Une superbe formation !" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Catégorie</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
        {{-- @foreach ($categories as $category)
            <optgroup label="{{$category->name}}">
            <option value="{{$category->name}}"> {{$category->name}}
            @include('categories.tree-option',['categories'=> $category->children, "separateur"=>$separateur])
            </option>
            </optgroup>
         
        @endforeach --}}
        @include('categories.tree-option',['categories'=> $categories, "separateur"=>"├─"])
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ old('description') }}</textarea>
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