

<srcipt src="./app.js"></srcipt>


<link rel="stylesheet" href="{{ asset('css/app2.css') }}>

          <strong class="d-inline-block col -2 mb-4 text-success></strong>
                  

<form action="{{ route('events.search') }}" class="d-flex mr-1">

<div class="form-group mb-0 mr-0">

<input type="text" name="search" class="form-control" value="{{ request()->search  }}" <input type="search" name="search"
placeholder="Enter keyword" />
</div>
       

<button type="submit"  class="btn btn-info" > <i class="fa fa-search" aria-hidden="true" > </i></button>

  

</form>



     


