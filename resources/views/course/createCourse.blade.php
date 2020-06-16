@extends('master')


@section('content')

<form action="{{ url('/course/insert') }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Course title</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="A wonderfull course !" required>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Catégory(ies)</label>
      <select class="form-control" id="exampleFormControlSelect1" name="categories">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Text</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
    </div>

    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>

  </form>

@endsection