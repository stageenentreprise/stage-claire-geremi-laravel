@extends('master')


@section('content')

<form action="{{ url('/part/update/'.$part->id) }}" method="POST">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Titre de la partie ({{ old('title', $part->title) }})</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title', $part->title) }}" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">Numéro {{ old('category_id', $part->numero) }}</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="numero" value="{{ old('numero', $part->numero) }}" required>
        @error('numero')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Description</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3">{{ old('description', $part->description) }}</textarea>
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