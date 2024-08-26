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
            margin: 0 0 15px 0;
        }
        p{
            margin: 0 0 3px 0;
        }
        textarea{
            width: 100%;
            min-height: 40vh;
        }
        small{
            color: #996;
        }
        .container {
            padding: 20px 15px;
            width: 60%;
            margin: 3% 0 0 20%;
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
        form label {
            display: block;
            margin: 0 0 3px 0;
        }
        form input[type="text"] {
            display: block;
            padding: 5px 7px;
        }
    </style>
</head>
<body>
    <section class="container">
        <h4>{{$title}}</h4>

        <form action="{{__url('forge/env')}}" method="POST">
            @if(empty(env('HYDRA_HASH')))
            <div class="block" style="background: #fff;border: 1px solid #ddd;display:table;margin: 0 0 15px 0;padding:15px 15px;">
                <label for="password">{{__("Define una clave de recuperación")}}</label>
                <table>
                    <tr>
                        <td>
                        <input type="text" 
                            name="password" 
                            value="{{old('password', \Str::random(12))}}"
                            class="form-control">
                        </td>
                        <td>
                            <button type="submit" class="btn">Actualizar</button>
                        </td>
                    </tr>
                </table>   
            </div>
            @endif
            <div class="block">
                <label for="textarea">{{__("Edite las variables de entornos a requerimiento de su proyecto")}}</label>            
                <textarea name="env"
                    spellcheck="false">{!! $env !!}</textarea>                
            </div>

            <div class="block">
                @csrf

                <a href="{{__url('/forge')}}" class="btn">
                    << {{__("Regresar")}}
                </a>
                <button type="submit" class="btn">Actualizar</button>

                <a href="{{__url('/forge/env/publish')}}" class="btn">
                    {{__("Publicar ficheros")}}
                </a>

                <a href="{{__url('/forge/database')}}" class="btn">
                    {{__("Siguiente")}} >>
                </a>
            </div>
        </form>
    </section>
</body>
</html>