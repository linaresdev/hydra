
        {{session()->get("alert.login.status")}}
        <ul class="nav flex-column mb-2 rounded-1">                            
            @foreach($messages as $row )
            <li class="nav-item text-danger">{{$row}}</li>
            @endforeach
        </ul>