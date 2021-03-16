@extends('layouts.admin')
@push('style')
    <style>
body {
  background-color: #f7ebd3;
}
</style>
@endpush
@section('content')

@include('layouts.partial.navbar')
<div class="container" style="heigth=100px">
<header>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <br>
        <br>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <center>
            <img class="d-block" width="100%" height="400px" src="new\assets\img\avatars\avatar1.jpg"  alt="First slide">
            </center>
            </div>

            <div class="carousel-item"><center>
            <img class="d-block " width="100%" height="400px" src="new\assets\img\avatars\avatar2.jpg"  alt="Second slide"></center>
            </div>
            <div class="carousel-item"><center>
            <img class="d-block" width="100%" height="400px" src="new\assets\img\avatars\avatar3.jpg"  alt="Third slide"></center>
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
    </header>
</div>
    
	<br>

	<div class="container">
      <div class="card-body" align="right">
      
      <div class="dropdown show">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <!-- @foreach($category as $c) -->
          <a href="" class="dropdown-item" name="id_category" id="id_category"   ></a>
          <!-- @endforeach -->
        </div>
      </div>           
     
      </div>

  </div>
 	<section>
  <div class="container">
  <div class="row">
  @foreach($barangs as $g)
  
           <div class="col-md-3 col-sm-5 col-xs-11" >
              <div class="card" style="height: 98%;">
                  <img src="{{ url('/data_file/'.$g->file) }}" class="card-img-top" width="150px" height="150px" alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><b>{{$g->nama}}</b></h5>
                      <p class="card-text" >{{$g->keterangan}}</p>
                      <p class="card-text"><small class="text-muted">{{$g->harga}}</small></p>
                      <p class="card-text"><small class="text-muted float-left">Stock Tersedia {{$g->stock}}</small></p>
                      <button type="button"  class="btn btn-outline-primary float-right"><a href="halaman-beli">Beli</a></button>
                    </div>
              </div>
           </div>          
  @endforeach
  
  <br>
	</div>		
  </div>
		
	</section>
  
@endsection
@push('scripts')
	@include('layouts.partial.script')
	@endpush