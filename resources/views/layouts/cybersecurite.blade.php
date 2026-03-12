<!doctype html>
<html lang="fr">
    <head>
        <title>THOLDI</title>
        <!-- Bootstrap core CSS & JS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

        <!-- Custom CSS -->
        <link href="{!! asset('css/custom.css') !!}" rel="stylesheet">
        <!-- Custom JS -->
        <script src="{{ asset('js/custom.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    </head>
    <body>    
        <div class="container ">

            <h1 class="display-4">
                @yield("title")
            </h1>
            <img src="{{ asset('images/logo_tholdi.png')}}"  class="   img-fluid rounded-pill  " 
             alt="Responsive image">  
            <div class="float-end"><img src="{{ asset('images/cybersecurite.jpeg')}}"  class="   img-fluid rounded-pill  " 
             alt="Responsive image"> </div><br>            
            <p class="lead"> 
                @yield("content")
            </p>
        </div>
    </body>
</html>