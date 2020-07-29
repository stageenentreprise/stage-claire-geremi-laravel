@extends('master')

@section('content')

    <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tableau de bord</h5>
              <p class="card-text">En cliquant ici, vous pourrez modifier/créer une formation.</p>
              <a href="{{url('/courses')}}" class="btn btn-primary">Y aller</a>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tableau de bord</h5>
              <p class="card-text">Et ici une catégorie.</p>
              <a href="{{url('/categories')}}" class="btn btn-primary">Y aller</a>
            </div>
          </div>
        </div>
      </div>
@endsection