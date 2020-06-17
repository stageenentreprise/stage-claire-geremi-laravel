@extends('master')


@section('content')

<form action="{{ url('/course/insert') }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Course title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}" placeholder="A wonderfull course !" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Catégory</label>
      <select class="form-control" id="exampleFormControlSelect1" name="category_id">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Text</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" value="{{ old('text') }}" rows="3"></textarea>
      @error('text')
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