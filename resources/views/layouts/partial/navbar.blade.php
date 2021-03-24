<link rel="stylesheet" href="New/assets/font-awesome/css/font-awesome.min.css">
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">

        <div class="container"><a class="navbar-brand logo" href="/">Gudang Beruang</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <div class="input-group">
                <!-- <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" rows="3" class="btn btn-outline-primary">search</button>    -->                
    <input class="form-control mr-sm-2 col-md-7" type="search"  placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    
                    
    
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="/catalog"><i class="fa fa-book"> Catalog</i></a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kategori</a>
                            <div class="dropdown-menu">
                            <?php if(is_array($category) || is_object($category)){ ?>
                                @foreach($category as $c)
                                        <ul class="nav nav-pills" role="tablist">
                                            <li class="nav-item">
                                            <a href="{{ url('/category/'.$c->id) }}" class="dropdown-item" name="id_category" id="id_category">{{$c->nama}}</a>
                                        </li>
                                        </ul>
                                @endforeach
                            <?php }; ?>
                        </div>
                    </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.php"><i class="fa fa-id-badge" aria-hidden="true"> About Us</i></a></li>
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link"href="{{ route('keranjang') }}">
                                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                                 <div class="badge badge-danger">
                                        @auth
                                            @if(json_decode(app('request')->cookie('dw-carts'), true))
                                                {{count(json_decode(app('request')->cookie('dw-carts'), true))}}
                                            @else
                                                0
                                            @endif
                                        @else
                                        0
                                        @endauth
                                    </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="btn dropdown-toggle text-center pr-3 nav-link bg-transparent text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle text-dark"></i> {{Auth::user()->name}}
                                </a>

                                <div class="dropdown-menu item-dropdown" aria-labelledby="dropdownMenuLink">
                                    <!-- dropdown profile -->
                                    <a class="dropdown-item nav-link" href="/profile" >

                                                <i class="fa fa-user-circle mr-3 ml-1"></i>Profile


                                    </a>
                                    <!-- dropdown Logout -->
                                    <a class="dropdown-item nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" >
                                            <i class="fa fa-power-off mr-3 ml-1"></i> Logout

                                    </a>
                                    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </li>
                        @else
                            
                        <li class="nav-item"><a class="nav-link"href="{{ route('login') }}">Login</a></li>
                        @endif
                </ul>
                
            </div>
        </div>
        </div>
    </nav>
