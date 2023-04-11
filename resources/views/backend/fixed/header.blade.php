<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.html">PMS</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
   - Navbar
    <!-- <select name="language" id="language">
        <option @if(session()->get('loc')=='en') selected @endif value="{{route('switch.lang','en')}}">EN</option>
        <option @if(session()->get('loc')=='bn') selected @endif value="{{route('switch.lang','bn')}}">BN</option>
    </select>  -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="{{url('/backend/uploads/user.avif')}}" alt="" width="40px" height="auto"></a>
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