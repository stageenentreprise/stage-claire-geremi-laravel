<h2>Laissez un commentaire:</h2>

<form method="POST" action="{{url('/comment/'.$course->id.'/insert')}}">
  
  @csrf

  {{-- <div class="rating"><!--
--><a href="#5" title="Donner 5 étoiles">☆</a><!--
--><a href="#4" title="Donner 4 étoiles">☆</a><!--
--><a href="#3" title="Donner 3 étoiles">☆</a><!--
--><a href="#2" title="Donner 2 étoiles">☆</a><!--
--><a href="#1" title="Donner 1 étoile">☆</a>
  </div> --}}
  <select name="rate">
    <option value="5">☆☆☆☆☆</option>
    <option value="4">☆☆☆☆</option>
    <option value="3">☆☆☆</option>
    <option value="2">☆☆</option>
    <option value="1">☆</option>
  </select>

  
   <textarea name="content" rows="10" cols="100" placeholder="Votre commentaire..."></textarea><br />
   <input type="submit" value="Poster mon commentaire" name="submit_commentaire"/>

</form>



{{--CSS DU RATING .rating a {
  float: right;
  color: #aaa;
  text-decoration: none;
  font-size: 3em;
  transition: color .4s;
}
.rating a:hover,
.rating a:focus,
.rating a:hover ~ a,
.rating a:focus ~ a {
  color: orange;
  cursor: pointer;
} --}}