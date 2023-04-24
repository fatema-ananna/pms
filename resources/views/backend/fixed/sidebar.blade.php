<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="{{route('Dashboard')}}">
                    <div class="sb-nav-link-icon mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <a class="nav-link" href="{{route('inmate')}}">
                    <div class="fa fa-user mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Inmates
                </a>

                <a class="nav-link" href="{{route('case')}}">
                    <div class="fa fa-bars mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Case
                </a>



                <a class="nav-link" href="{{route('ward')}}">
                    <div class="fa fa-bars mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    ward
                </a>

                <a class="nav-link" href="{{route('cell')}}">
                    <div class="fa fa-bars mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    cell
                </a>
                <a class="nav-link" href="{{route('activity')}}">
                    <div class="fa fa-address-book mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Activity
                </a>
                <a class="nav-link" href="{{route('visitor')}}">
                    <div class="sb-nav-link-icon mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Visitor
                </a>

                @if(checkHasPermission(auth()->user()->role_id,'staff'))
                <a class="nav-link" href="{{route('staff')}}">
                    <div class="sb-nav-link-icon mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Staff
                </a>
                @endif
                <a class="nav-link" href="{{route('punishment')}}">
                    <div class="sb-nav-link-icon mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Punishment
                </a>
                <a class="nav-link" href="{{route('station')}}">
                    <div class="sb-nav-link-icon mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Police Station
                </a>
                <a class="nav-link" href="{{route('crime')}}">
                    <div class="sb-nav-link-icon mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Crime Type
                </a>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('roles.index')}}">
                        <span data-feather="file" class="align-text-bottom mr-2"></span>
                        Roles
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('permission.list')}}">
                        <span data-feather="file" class="align-text-bottom mr-2"></span>
                        Permissions
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.users')}}">
                        <span data-feather="file" class="align-text-bottom mr-2"></span>
                        Users
                    </a>
                </li>

                <a class="nav-link" href="{{route('backend.payment')}}">
                    <div class="fa fa-credit-card mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Payment
                </a>

                <a class="nav-link" href="{{route('reports')}}">
                    <div class="fa fa-address-book mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Report
                </a>
                <a class="nav-link" href="{{route('gallery')}}">
                    <div class="fa fa-address-book mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Gallery
                </a>
                <a class="nav-link" href="{{route('notice')}}">
                    <div class="fa fa-address-book mr-2"><i class="fas fa-tachometer-alt"></i></div>
                    Notice
                </a>

            </div>
        </div>


</div>