@extends('layouts.app')
@section('content')


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

<srcipt src="./app.js"></srcipt>




</srcipt>


<div class="col-md-15">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-6 shadow-sm h-md-300 position-relative">
        <div class="col p-5 d-flex flex-column position-static">
          <strong class="d-inline-block mb-0 text-success"></strong>
         
        
        <!--   <div class="mb-1 text-muted">Date: {{ $event->created_at->format('d/m/y') }}</div> -->
        <h4 class="mb-0"> {{ $event->title }}</h4>
          <p class="card-text mb-auto">{{ $event->description }} </p>

          <strong class=" mb-auto font-weight-nornal text-secondary">Price: £ {{ $event->getPrice() }}</strong>
          <hr>
          <strong class=" mb-auto font-weight-nornal text-secondary">Date: {{ $event-> date }}</strong>
          <hr>
          <!-- like button here -->
          <button class="like__btn">
   <span id="icon"><i class=""></i></span>
   <img src="/img/like.jpg" class="img-rounded" alt="Cinque Terre" width="40" height="40">
   <span id="count">0</span> Like
</button>

<!-- this is to display the content of event table and add to the booking list  -->
<form method="POST" action="{{ route('booking.store') }}">
  
@csrf

<input type="hidden" name="id" value="{{ $event->id }}">
<input type="hidden" name="name" value="{{ $event->name }}">
<input type="hidden" name="title" value="{{ $event->title }}">

<input type="hidden" name="price" value="{{ $event->price }}">


<button type="submit" class="btn btn-dark"> Proceed Booking</button>



</form> 


        </div>
        <div class="col-auto d-none d-lg-block">
         
          <img src="{{ $event->image }}" class="img-rounded" alt="Cinque Terre" width="400" height="300"> 
        </div>
      </div>
    </div>
    @endsection