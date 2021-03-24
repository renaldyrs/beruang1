<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Menu Admin</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="adminhome"><i class="fa fa-area-chart" aria-hidden="true"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-envelope" aria-hidden="true"></i> Pesanan</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Informasi Pesanan</a>
                        </li>
                        <li>
                            <a href="#">pesanan dikirim</a>
                        </li>
                        <li>
                            <a href="#">Pesanan Diterima</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-archive" aria-hidden="true"></i> Data</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li>
                    <a href="adminbarang"><i class="fa fa-archive" aria-hidden="true"></i> Produk</a>
                    </li>
                    <li>
                        <a href="adminsupplier"><i class="fa fa-industry" aria-hidden="true"></i> Supplier</a>
                    </li>
                    <li>
                        <a href="adminkurir"><i class="fa fa-industry" aria-hidden="true"></i> Kurir</a>
                    </li>
                    <li>
                        <a href="adminbank"><i class="fa fa-industry" aria-hidden="true"></i> Bank</a>
                    </li>
                        </ul>
                    </li>
               
                <li>
                    <a href="laporan"><i class="fa fa-file-text-o" aria-hidden="true"></i> Laporan</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fa fa-bars fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Selamat datang Admin, </a>
                            </li>
                            <li class="nav-item active">
                                
                                <a class="dropdown-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                                            <i class="fa fa-power-off mr-3 ml-1"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>