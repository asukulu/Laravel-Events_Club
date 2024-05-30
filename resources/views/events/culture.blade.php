@extends('layouts.app')


@section('content')

@foreach ($events as $event)



<style>

@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");

body {


  background: #e8efff;
  display: flex;
  width: 100%;
  height: 100vh;
}

.like__btn {
  padding: 5px 5px, 1px,5px;
  background: #e8efff;
  font-size: 18px;
  font-family: "Open Sans", sans-serif;
  border-radius: 0px;
  color: black;
  outline: none;
  border: none;
  cursor: pointer;
}


</style>


<div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-5 shadow-sm h-md-280 position-relative">
      <div class="col p-5 d-flex flex-column position-static">
        <strong class="d-inline-block mb-5 text-primary">
         {{ $event->title }}</strong>
        <h6 class="mb-1"> {{ $event->name }}</h6>
        <div class="mb-1 text-muted">Date: {{ $event->date}}  </div>
        <div class="mb-1 text-muted"> Time: {{ $event->time }} </div>
        <p class="card-text mb-auto"> Organiser: {{ $event->organiser }} </p>
        <p class="card-text mb-auto"> Venue: {{ $event->venue }} </p>
        <strong class=" mb-auto"> Price: £{{ $event->getPrice() }}</strong>
        <a href="{{ route('events.show', $event->slug) }}" class="stretched-link btn btn-info">View more</a>
      </div>
      <div class="col-auto d-none d-lg-block">
       <!--  <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg> -->
        <!-- <img src="{{ $event->image }}" alt=""> -->
        <img src="{{ $event->image }}" class="img-rounded" alt="Cinque Terre" width="300" height="250"> 
      </div>
    </div>
  </div>


@endforeach

@endsection