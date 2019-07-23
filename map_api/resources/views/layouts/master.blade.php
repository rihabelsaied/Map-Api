<!doctype html>
<html>
    <head>
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
      <meta charset="utf-8">

      <title>Map_api</title>
        

      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/style.css')}}">

        


   </head>
   <body>
       @yield('content')
        <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>

        <script src="{{asset('js/map.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>


      
  </body>

</html>
