@extends('master')


@section('content')

<form action="{{ url('/course/insert') }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Titre de la partie</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}" placeholder="Une superbe partie !" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>

    <div class="form-group">
      <label for="exampleFormControlInput1">numéro de la partie</label>
      <input type="text" class="form-control" id="exampleFormControlInput1" name="part_id" value="{{ old('part_id') }}" placeholder="Numéro de la partie" required>
      @error('part_id')
          {{ $message }}
      @enderror
    </div>

    <div class="form-group">
      <label for="exampleFormControlTextarea1">Texte</label>
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