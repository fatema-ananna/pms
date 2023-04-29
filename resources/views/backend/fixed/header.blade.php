<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">PMS</a>
    
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      
    </form>

    <!-- <select name="language" id="language">
        <option @if(session()->get('loc')=='en') selected @endif value="{{route('switch.lang','en')}}">EN</option>
        <option @if(session()->get('loc')=='bn') selected @endif value="{{route('switch.lang','bn')}}">BN</option>
    </select>  -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{url('/backend/uploads/user.avif')}}" alt="" width="40px" height="auto">
            <i class="fas fa-user"></i>
        </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">


                <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>

@section("scripts")

<script>


    $("#language").on("change",function(e){
        var select = $("#language").val()
        location.href= select
    })
    
</script>

@endsection