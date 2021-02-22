<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Gudang Beruang</title>
    <link rel="stylesheet" href="New/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="New/assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="New/assets/css/smoothproducts.css">
    <link rel="stylesheet" href="New/assets/css/css.css">
    <link rel="stylesheet" href="New/assets/css/css_carcoal.css">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white  clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">Gudang Beruang</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navcol-1">
                <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-primary">search</button>
                    
    
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#"></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Catalog</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="features.php">Category</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="about-us.php">AboutUS</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="contact-us.php">Login</a></li>
                    
                </ul>
                
            </div>
        </div>
        </div>
    </nav>
    <main id="slider">
            <div id="carouselIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <center>
            <img class="d-block img-fluid" width="87%"src="New\assets\img\223.jpg" alt="First slide">
            </center>
            </div>

            <div class="carousel-item"><center>
            <img class="d-block " width="87%" src="New\assets\img\223.jpg" alt="Second slide"></center>
            </div>
            <div class="carousel-item"><center>
            <img class="d-block h-75" width="87%" src="New\assets\img\223.jpg" alt="Third slide"></center>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>
</main>
	<br>
        <section>
        <div class="row"><!-- 25%  awal-->
            <div class="col-md-2 ">
            <div class="card" style="height: 100%;">
                <!-- <nav class="nav flex-column" id="navcate">  -->
                <div class="card-body" align="right">
                    <h4>Category</h4>
                    <br>
                    <ul>
                    <li style="list-style:none;" class="nav-item" role="presentation"><a class="nav-link active" href="index.php">Catalog</a></li>
                    <li style="list-style:none;" class="nav-item" role="presentation"><a class="nav-link" href="features.php">Category</a></li>
                    <li style="list-style:none;" class="nav-item" role="presentation"><a class="nav-link" href="about-us.php">AboutUS</a></li>
                    <li style="list-style:none;" class="nav-item" role="presentation"><a class="nav-link" href="contact-us.php">Login</a></li>
                    </ul>  
                </div>
                <!-- </nav> -->
            </div>
            </div> <!-- 25% akhir -->
            <div class="col-9"><!-- 75%  awal-->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="height: 98%;">
                            <img src="{{ url('/data_file/1613623823_topi.jpg') }}" class="card-img-top" width="150px" height="150px" alt="...">
                                <div class="card-body">
                                <h5 class="card-title"><b>nama</b></h5>
                                <p class="card-text" >keterangan</p>
                                <p class="card-text"><small class="text-muted">harga</small></p>
                                <p class="card-text"><small class="text-muted float-left">Stock Tersedia stock</small></p>
                                <button type="button" class="btn btn-outline-primary float-right">Beli</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 98%;">
                            <img src="{{ url('/data_file/1613623823_topi.jpg') }}" class="card-img-top" width="150px" height="150px" alt="...">
                                <div class="card-body">
                                <h5 class="card-title"><b>nama</b></h5>
                                <p class="card-text" >keterangan</p>
                                <p class="card-text"><small class="text-muted">harga</small></p>
                                <p class="card-text"><small class="text-muted float-left">Stock Tersedia stock</small></p>
                                <button type="button" class="btn btn-outline-primary float-right">Beli</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 98%;">
                            <img src="{{ url('/data_file/1613623823_topi.jpg') }}" class="card-img-top" width="150px" height="150px" alt="...">
                                <div class="card-body">
                                <h5 class="card-title"><b>nama</b></h5>
                                <p class="card-text" >keterangan</p>
                                <p class="card-text"><small class="text-muted">harga</small></p>
                                <p class="card-text"><small class="text-muted float-left">Stock Tersedia stock</small></p>
                                <button type="button" class="btn btn-outline-primary float-right">Beli</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 98%;">
                            <img src="{{ url('/data_file/1613623823_topi.jpg') }}" class="card-img-top" width="150px" height="150px" alt="...">
                                <div class="card-body">
                                <h5 class="card-title"><b>nama</b></h5>
                                <p class="card-text" >keterangan</p>
                                <p class="card-text"><small class="text-muted">harga</small></p>
                                <p class="card-text"><small class="text-muted float-left">Stock Tersedia stock</small></p>
                                <button type="button" class="btn btn-outline-primary float-right">Beli</button>
                                </div>
                        </div>
                    </div>

                    <div class="col-md-3">

                </div>
            
           
            </div> <!-- 75%  akhir-->
        </div>      
        </section>
    </footer>
    <script src="New/assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="New/assets/js/smoothproducts.min.js"></script>
    <script src="New/assets/js/theme.js"></script>
</body>

</html>