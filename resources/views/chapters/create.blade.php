@extends('master')


@section('content')

<form action="{{ url('/part/'.$id.'/chapter/insert') }}" method="post">

    @csrf


    <div class="form-group">
        <label for="exampleFormControlInput1">Titre de la partie</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="{{ old('title') }}" placeholder="Une superbe partie !" required>
        @error('title')
            {{ $message }}
        @enderror
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Contenu</label>
      <textarea class="form-control" id="mce" name="content" rows="3">{{ old('description') }}</textarea>
      @error('content')
          {{ $message }}
      @enderror
    </div>
    <div class="form-group">
        <label for="photo">Vidéo</label>
        <input class="fullwidth @error("video") error @enderror"  type="file" id="video" name="video">
        @error("video") <div class="text-big red">{{$message}}</div> @enderror
    </div>

    <div class="row">
        <div class="col text-center">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>

  </form>

<script src='https://cdn.tiny.cloud/1/qc0l6ipo1j5u0g0thhy9w698h5eb1roomralrmjcfnzup6tr/tinymce/5/tinymce.min.js' referrerpolicy="origin">

  </script>

  <script>
    tinymce.init({
      selector: '#mce'
    });

</script>

@endsection