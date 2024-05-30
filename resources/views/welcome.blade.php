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

        </style>
    </head>
    <body class="antialiased">

     
             
               
                               @include('components.splash') 

                               

                
                    </div>
                </div>
            </div>
        </div>
    </body>

    @endsection('content')