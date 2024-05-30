@extends('layouts.app')

@section('content')

<!-- if the shooping list is not zero it will display the content. -->
@if (Cart::count() > 0)


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

<div class="px-4 px-lg-0">

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Events</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>

                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Date</div>
                  </th>

                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Bookings </div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                </tr>
              </thead>
              <tbody>
           @foreach (Cart::content() as $event)

           
           <tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="{{ $event->model->image }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"><a href="#" class="text-dark d-inline-block align-middle">{{ $event->model->title }} </a></h5><span class="text-muted font-weight-normal font-italic"></span>
                      </div>
                      
                    </div>
                  </th>
            
                  <td class="border-0 align-middle"><strong>{{ $event->model->getPrice() }}</strong></td>
                  <td class="border-0 align-middle"><strong>{{ $event->model->date }}</strong></td>
              
                  <td class="border-0 align-middle"><strong>1</strong></td>
                  <td class="border-0 align-middle">
          
                

           
 <!-- this is to prompt the user if they want to delete or not.                -->
<a class= "btn btn-dark p-1 text-white"href="#"
onclick="

var result = confirm('Do you wish to delete?');
if( result ) {
   event.preventDefault();
   document.getElementById('delete-form').submit();

}
" 
>
Delete 
</a>

                  <form id="delete-form" action="{{ route('booking.destroy' , $event->rowId) }}" method="POST" style="display:none;">
                  <input type="hidden" name="_method" value="delete">
                      @csrf

                      @method('DELETE')

                
                  <button type="submit" class="text-dark"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
             
                 
                    </form>
                    </td>
                </tr>

           @endforeach
    
              </tbody>
            </table>
          </div>
  <p> <div>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

              <!-- <ul><a> <button href="{{ route('events.index') }}"  class="btn btn- rounded-pill py-2 btn-block btn-success" id="submit">Book</button></a>
 -->
              
              <script> 
              $(document).ready(function()
              {
                $("button").click(function()
                {
                  alert("Deleted!")
                })
              })

           
            </script>

            
@if (request()->input())
<h4> {{ $events->total() }} result(s) for "{{ request()->search }} "</h4>
@endif
               </div>
               </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@else
<div class="col-md-12">
<p> You booking list is empty</P>

</div>
@endif




@endsection


