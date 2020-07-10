@extends('master')


@section('content')


   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach

  <a target="_blank" href="{{url('/course/view/'.$courseid->id)}}" class="card-link col text-center btn btn-info">{{$courseid->title}}</a>

<form action="{{ url('/part/insert') }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Nom de la partie</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}" placeholder="Une superbe partie !" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">Numéro de la partie</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="numero" value="{{ old('numero') }}" placeholder="Numéro de la partie" required>
      @error('part_id')
          {{ $message }}
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" value="{{ old('description') }}" rows="3"></textarea>
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