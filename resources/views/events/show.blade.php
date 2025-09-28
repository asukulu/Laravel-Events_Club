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
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  background: #ffffff;
  font-size: 16px;
  font-family: "Open Sans", sans-serif;
  border-radius: 25px;
  color: #333;
  outline: none;
  border: 1px solid #ddd;
  cursor: pointer;
  transition: all 0.3s ease;
}

.like__btn:hover {
  background: #f0f8ff;
  border-color: #0080ff;
  color: #0080ff;
}

.like__btn i {
  font-size: 20px;
  transition: transform 0.2s ease;
}

.like__btn.liked i {
  color: red;
  transform: scale(1.2);
}
</style>

<!-- Use Font Awesome for like/heart icon -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<div class="col-md-15">
  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-6 shadow-sm h-md-300 position-relative">
    <div class="col p-5 d-flex flex-column position-static">

      <h4 class="mb-0">{{ $event->title }}</h4>
      <p class="card-text mb-auto">{{ $event->description }}</p>

      <strong class="mb-auto text-secondary">Price: £{{ $event->getPrice() }}</strong>
      <hr>
      <strong class="mb-auto text-secondary">Date: {{ $event->date }}</strong>
      <hr>

      <!-- Like button -->
      <button class="like__btn" id="likeBtn">
        <i class="far fa-heart" id="likeIcon"></i>
        <span id="count">0</span> Likes
      </button>

      <!-- Booking Form -->
      <form method="POST" action="{{ route('booking.store') }}" class="mt-3">
        @csrf
        <input type="hidden" name="id" value="{{ $event->id }}">
        <input type="hidden" name="name" value="{{ $event->name }}">
        <input type="hidden" name="title" value="{{ $event->title }}">
        <input type="hidden" name="price" value="{{ $event->price }}">

        <button type="submit" class="btn btn-dark">Proceed Booking</button>
      </form> 
    </div>

    <div class="col-auto d-none d-lg-block">
      <img src="{{ $event->image }}" class="img-rounded" alt="Event Image" width="400" height="300">
    </div>
  </div>
</div>

<!-- Like Button Script -->
<script>
  let likeBtn = document.getElementById("likeBtn");
  let likeIcon = document.getElementById("likeIcon");
  let count = document.getElementById("count");
  let liked = false;

  likeBtn.addEventListener("click", function() {
    liked = !liked;
    if (liked) {
      likeIcon.classList.remove("far"); // empty heart
      likeIcon.classList.add("fas");    // solid heart
      likeBtn.classList.add("liked");
      count.textContent = parseInt(count.textContent) + 1;
    } else {
      likeIcon.classList.remove("fas");
      likeIcon.classList.add("far");
      likeBtn.classList.remove("liked");
      count.textContent = parseInt(count.textContent) - 1;
    }
  });
</script>
@endsection
