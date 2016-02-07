
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >
 
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aplicación películas</title>
 
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  {!! Html::style('css/foundation.css') !!}
  {!! Html::style('css/normalize.css') !!}
 
  <script src="{{ URL::asset('js/vendor/custom.modernizr.js') }}"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>


 
</head>

    <body>

        <div class="row">
            <div class="small-12 small-centered columns panel callout"><h1 class="text-center">Aplicación películas</h1> </div>
        </div>
        <div class="row">
        <div class="small-9 columns" id="usuarios"></div>
        <div class="small-3 columns panel" id="peliculas"></div>
        </div>

    <script type="text/javascript">

    function readJSON(file) {
        var request = new XMLHttpRequest();
        request.open('GET', file, false);
        request.send(null);
        if (request.status == 200)
            return request.responseText;
        };
      $(document).ready(function () {
                var cad = "";
                   var cadena = $.getJSON("/movies", function (data) {
                     for (p in data.movies) {
                        var imdbPel = JSON.parse(readJSON("http://omdbapi.com?i="+ data.movies[p].imdb_id +"&plot=full&r=json"));
                            cad += '<div class="panel callout"><h5> ' + data.movies[p].name;
                            cad += '</h5><p><img class="th" src="'+ imdbPel.Poster +'"></p> ';
                            cad += "<small>"+ imdbPel.Plot +"</small>";
                            cad += "</div>";
                    
                     }
                     $("#peliculas").html(cad);
                })   

                var cad2 = "";
                  var cadena2 = $.getJSON("/users", function (data2) {
                    for (u in data2.users) {
                        cad2 += ('<div class="panel"><h3>user: ' + data2.users[u].id + " | nombre: " +
                            data2.users[u].username + ' | pass: ' + data2.users[u].password + '</h3><ul class="pricing-table">'
                            ).replace("y undefined", "").replace(", undefined", "");
                        for (pel in data2.users[u].movies) {
                            var imdbUser = JSON.parse(readJSON("http://omdbapi.com?i="+ data2.users[u].movies[pel].imdb_id +"&plot=full&r=json"));
                            cad2 += '<div class="panel callout"><h4> Título: ' + data2.users[u].movies[pel].name;
                            cad2 += ", estado suscripcion:"+ data2.users[u].movies[pel].pivot.status;
                            cad2 += '<p><img class="th" src="'+ imdbUser.Poster +'"></p>';
                            cad2 += "</h4> <h4> sinopsis: </h4></p><p>"+ imdbUser.Plot +"</p>";
                            cad2 += '<small><a href="#">Vista</a></small> | ';
                            cad2 += '<small><a href="#">No Vista</a></small> | ';
                            cad2 += '<small><a href="#">Cancelar suscripción</a></small>';
                            
                            cad2 += "</div>";
                        }
                        cad2 += "</div>";
                    }
                    cad2 += "</li>";
                    $("#usuarios").html(cad2);
                }) 
            });
        
    </script>


 

 
  <script src="{{ URL::asset('js/vendor/jquery.js') }}"></script>
  <script src="{{ URL::asset('js/foundation.min.js') }}"></script>
  
</body>
</html>

<!--<!DOCTYPE html>
<html lang="en">
    <head>
        <title>films subscriptions</title>

        <!-- CSS And JavaScript
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>

    <body>
        <div class="container" id="peliculas"></div>
        <div class="container" id="usuarios"></div>

    <script type="text/javascript">
      $(document).ready(function () {
                var cad = "Las películas:<br /><ul>";
                   var cadena = $.getJSON("http://lovemyrp.com:8000/movies", function (data) {
                     for (p in data.movies) {
                        cad += ("<li>" + data.movies[p].id + ", imdb " +
                           data.movies[p].imdb_id + ", título " +
                           data.movies[p].name  +
                           "</li>").replace("y undefined", "").replace(", undefined", "");
                     }
                     $("#peliculas").html(cad);
                })   

                var cad2 = "Lista de usuarios:<br /><ul>";
                  var cadena2 = $.getJSON("http://lovemyrp.com:8000/users", function (data2) {
                    for (u in data2.users) {
                        cad2 += ("<li>" + data2.users[u].id + ", nombre: " +
                            data2.users[u].username + ' pass: ' + data2.users[u].password + "<ul>"
                            ).replace("y undefined", "").replace(", undefined", "");
                        for (pel in data2.users[u].movies) {
                            cad2 += ("<li>imdb id: " + data2.users[u].movies[pel].imdb_id + ", Título: " + data2.users[u].movies[pel].name + ", estado suscripcion "+ data2.users[u].movies[pel].pivot.status +"</li>").replace("y undefined", "").replace(", undefined", "");

                        }
                        cad2 += "</li></ul>";
                    }
                    cad2 += "</ul>";
                    $("#usuarios").html(cad2);
                }) 
                 
                  
       });
        
    </script>

    </body>
</html>-->

