<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{$title}}</title>
        @section("css")

        <link href="{{__url('{cdn}/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{__url('{cdn}/css/materialdesignicons.min.css')}}" rel="stylesheet">
        <style rel="stylesheet">
            body{
                background: #f3f3f3;
                padding-top: 64px;
            }
        </style>
        @show

    </head>

    <body>
        <main class="container">
            
            <article class="col-lg-6 offset-lg-3 col-md-6 offset-md-3 col-sm-12">
                
                <h4 class="mb-4">
                    <span class="mdi mdi-account-circle"></span>
                    {{$title}}
                </h4>
                <form action="{{__url('forge/account')}}" method="POST">                   
                    
                    <section class="card">
                        <article class="card-body">
                            <h4 class="mb-3">Formulario</h4>

                            @if($errors->any())
                            <div class="mb-2 px-3 py-2 bg-light rounded-1">
                                @foreach($errors->all() as $error)
                                    <div class="text-danger-emphasis" style="font-size: .9rem;">
                                       - {{$error}}
                                    </div>
                                @endforeach
                            </div>
                            @endif

                            <div class="form-floating mb-2">
                                <input type="text"
                                    name="name"
                                    value="{{old('name')}}"
                                    id="name"
                                    placeholder="{{__('Nombre')}}" 
                                    class="form-control">
                                <label for="name">{{__("Nombre")}}</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="email"
                                    name="email"
                                    value="{{old('email')}}"
                                    id="email"
                                    placeholder="{{__('Correo Electronico')}}" 
                                    class="form-control">
                                <label for="email">{{__("Correo Electronico")}}</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input type="password"
                                    name="password"
                                    value="{{old('password')}}"
                                    id="password"
                                    placeholder="{{__('Contraseña')}}" 
                                    class="form-control">
                                <label for="password">{{__("Contraseña")}}</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password"
                                    name="confirm"
                                    value="{{old('confirm')}}"
                                    id="confirm"
                                    placeholder="{{__('Confirmar contraseña')}}" 
                                    class="form-control">
                                <label for="confirm">{{__("Confirmar contraseña")}}</label>
                            </div>

                            <div class="mb-3">
                                @csrf
                                <input type="hidden" name="activated" value="1">
                                <a href="{{__url('forge/database')}}" class="btn btn-sm btn-primary">
                                    << {{__("Retroceder")}}
                                </a>
                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                    {{__("Finalizar y cerrar")}}
                                </button>
                            </div>
                        </article>
                    </section>
                </form>
                
            </article>

        </main>
    </body>
    @section("js")

    <script type="text/javascript" src="{{__url('{cdn}/js/jquery-371.min.js')}}"></script>
    <script type="text/javascript" src="{{__url('{cdn}/js/bootstrap.bundle.min.js')}}"></script>     
    @show
</html>