<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <style>
        body{
            background: #f3f3f3;
        }
        h4{
            font-size: 28px;
            margin: 0 0 10px 0;
        }
        p{
            margin: 0 0 3px 0;
        }
        small{
            color: #996;
        }
        .container {
            padding: 20px 15px;
            width: 70%;
            margin: 10% 0 0 15%;
            text-align: center;
        }
        .block{
            padding: 0 0 15px 0;
        }
        .btn {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 6px 6px;
            color: #222;
            display: inline-block;
            font-size: 14px;
            padding: 5px 10px;
            text-decoration: none;            
        }
    </style>
</head>
<body>
    <section class="container">
        <header class="block">
            <h4>MALLA</h4>                    
            <p>
                {{__("Malla V-1.0 es un aplicativo de gestión para enfocado en el desarrollo de aplicaciones simple y de 
                alto nivel.")}}
            </p>
            <p>{{__("Al iniciar la instalación se registran las variables de entorno requeridas.")}}</p>
        </header>
        <article>
           <a class="btn" href="https://github.com/linaresdev/malla/blob/master/POLICIES.md" target="_blank">{{__("Politicas")}}</a>
           <a class="btn" href="https://github.com/linaresdev/malla" target="_blank">{{__("Soporte")}}</a>
           <a class="btn" href="{{__url('forge/env/extra')}}">{{__("Iniciar instalación")}}</a>
        </article>
    </section>
</body>
</html>