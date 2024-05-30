@extends('layouts.app')




@section('content')
<style>


body {
                font-family: 'Nunito', sans-serif;
            }

            @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");
body {
  background: #e8efff;
  display: flex;
}
.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>
<body>

<div class="about-section">


<h2 style="text-align:center">Event Organisers</h2>
<div class="row">
  <div class="column">
    <div class="card">
      
      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">Sports</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>jane@example.com</p>
        <p><button class="button">Tel:0765646246</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
    
      <div class="container">
        <h2>Mike Ross</h2>
        <p class="title">Culture</p>
        
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>.</p>
        <p><button class="button">Tel:0745473272</button></p>
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      
      <div class="container">
        <h2>John Doe</h2>
        <p class="title">Others</p>
        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
        <p>john@example.com</p>
        <p><button class="button">Tel:07453462728 </button></p>
      </div>
    </div>
  </div>
</div>
@endsection