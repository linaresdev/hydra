@extends("light::master")
    @section("body")

    <section class="container">
        <article class="col-lg-5 offset-lg-7 col-md-8 offset-md-2 col-sm-12">

            <div class="auth  bg-white rounded-2 shadow-sm mt-5 px-3 py-4{{$border('login')}}">
                <h4 class="fs-5 mb-2">
                    <span class="mdi mdi-shield-account-outline"></span>
                    {{__("words.loge-in")}}
                </h4>
                <div class="auth-body">
                    <form action="{{__url('{now}')}}" method="POST">

                        {!! Alert::form("login") !!}

                        <div class="form-floating mb-2">
                            <input type="text"
                                name="email"
                                value="{{old('email')}}" 
                                class="form-control"
                                id="email"
                                placeholder="{{__('words.email')}}">
                            <label for="email">{{__('words.email')}}</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text"
                                name="password"
                                value="{{old('password')}}" 
                                class="form-control"
                                id="pasword"
                                placeholder="{{__('words.password')}}">
                            <label for="login">{{__('words.password')}}</label>
                        </div>
                        <div class="">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="mdi mdi-login"></i>
                                {{__("words.login")}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </article>
    </section>    
    @endsection