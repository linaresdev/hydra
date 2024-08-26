<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    @section("css")

    <link href="{{__url('{cdn}/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{__url('{cdn}/css/materialdesignicons.min.css')}}" rel="stylesheet">
    <link href="{{__url('{light}/css/layout.css')}}" rel="stylesheet">    
    @show
    
</head>
<body>
    @yield("body", "Body Content")
    @section("js")

    <script src="{{__url('{cdn}/js/jquery-371.min.js')}}"></script>
    <script src="{{__url('{cdn}/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{__url('{light}/js/layout.js')}}"></script>        
    @show
</body>
</html>